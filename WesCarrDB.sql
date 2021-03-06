USE [master]
GO
/****** Object:  Database [WesCarrDB]    Script Date: 28/09/2020 10:07:49 PM ******/
CREATE DATABASE [WesCarrDB]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'WesCarrDB', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\WesCarrDB.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'WesCarrDB_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\WesCarrDB_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [WesCarrDB] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [WesCarrDB].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [WesCarrDB] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [WesCarrDB] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [WesCarrDB] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [WesCarrDB] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [WesCarrDB] SET ARITHABORT OFF 
GO
ALTER DATABASE [WesCarrDB] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [WesCarrDB] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [WesCarrDB] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [WesCarrDB] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [WesCarrDB] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [WesCarrDB] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [WesCarrDB] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [WesCarrDB] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [WesCarrDB] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [WesCarrDB] SET  DISABLE_BROKER 
GO
ALTER DATABASE [WesCarrDB] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [WesCarrDB] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [WesCarrDB] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [WesCarrDB] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [WesCarrDB] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [WesCarrDB] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [WesCarrDB] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [WesCarrDB] SET RECOVERY FULL 
GO
ALTER DATABASE [WesCarrDB] SET  MULTI_USER 
GO
ALTER DATABASE [WesCarrDB] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [WesCarrDB] SET DB_CHAINING OFF 
GO
ALTER DATABASE [WesCarrDB] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [WesCarrDB] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [WesCarrDB] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'WesCarrDB', N'ON'
GO
ALTER DATABASE [WesCarrDB] SET QUERY_STORE = OFF
GO
USE [WesCarrDB]
GO
/****** Object:  Table [dbo].[CodeValues]    Script Date: 28/09/2020 10:07:49 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[CodeValues](
	[CodeValue] [int] IDENTITY(1,1) NOT NULL,
	[ParentCodeValue] [int] NULL,
	[Display] [nvarchar](256) NULL,
	[DisplayCode] [nvarchar](128) NULL,
	[DisplayOrder] [int] NULL,
	[Description] [nvarchar](256) NULL,
	[Active] [bit] NULL,
 CONSTRAINT [PK_CodeValues_1] PRIMARY KEY CLUSTERED 
(
	[CodeValue] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Patients]    Script Date: 28/09/2020 10:07:49 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Patients](
	[PatientID] [int] IDENTITY(1,1) NOT NULL,
	[MRN] [int] NOT NULL,
	[LastName] [nvarchar](128) NOT NULL,
	[FirstName] [nvarchar](128) NOT NULL,
	[MiddleName] [nvarchar](128) NULL,
	[DateOfBirth] [date] NOT NULL,
	[Gender] [nvarchar](6) NOT NULL,
 CONSTRAINT [PK_Patients] PRIMARY KEY CLUSTERED 
(
	[PatientID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY],
 CONSTRAINT [UNIQUE_MRN] UNIQUE NONCLUSTERED 
(
	[MRN] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[StudyCS]    Script Date: 28/09/2020 10:07:49 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[StudyCS](
	[CardiacS_ID] [int] NOT NULL,
	[StudyID] [int] NOT NULL,
	[PatientID] [int] NOT NULL,
	[TypicalAFL_1] [bit] NULL,
	[AtypicalAFL_1] [bit] NULL,
	[ParoxyAF_1] [bit] NULL,
	[PersistAF_1] [bit] NULL,
	[PermaAF_1] [bit] NULL,
	[AVNRT_1] [bit] NULL,
	[VT_1] [bit] NULL,
	[FOCAL_1] [bit] NULL,
	[AVRT_1] [bit] NULL,
	[SND_1] [bit] NULL,
	[AVND_1] [bit] NULL,
	[NIA_1] [bit] NULL,
	[TypicalAFL_2] [bit] NULL,
	[AtypicalAFL_2] [bit] NULL,
	[ParoxyAF_2] [bit] NULL,
	[PersistAF_2] [bit] NULL,
	[PermaAF_2] [bit] NULL,
	[AVNRT_2] [bit] NULL,
	[VT_2] [bit] NULL,
	[FOCAL_2] [bit] NULL,
	[AVRT_2] [bit] NULL,
	[SND_2] [bit] NULL,
	[AVND_2] [bit] NULL,
	[NIA_2] [bit] NULL,
	[Arrhythmia1_S] [bit] NULL,
	[Arrhythmia1_NT] [bit] NULL,
	[Arrhythmia1_M] [bit] NULL,
	[Arrhythmia1_U] [bit] NULL,
	[Arrhythmia1_Reason] [nvarchar](128) NULL,
	[ImplantPPM_S] [bit] NULL,
	[ImplantPPM_D] [bit] NULL,
	[ImplantPPM_U] [bit] NULL,
	[ImplantPPM_Reason] [nvarchar](128) NULL,
	[ImplantICD_S] [bit] NULL,
	[ImplantICD_D] [bit] NULL,
	[ImplantICD_U] [bit] NULL,
	[ImplantICD_Reason] [nvarchar](128) NULL,
	[Ablation] [bit] NULL,
	[DevImplant] [bit] NULL,
	[MedTherapy] [bit] NULL,
	[RefCardiacSurgery] [bit] NULL,
	[ClinicalMonitor] [bit] NULL,
	[OtherPlans] [nvarchar](128) NULL,
 CONSTRAINT [PK_StudyCS] PRIMARY KEY CLUSTERED 
(
	[CardiacS_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[StudyDM]    Script Date: 28/09/2020 10:07:49 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[StudyDM](
	[DM_ID] [int] NOT NULL,
	[StudyID] [int] NOT NULL,
	[PatientID] [int] NOT NULL,
	[PostproceduralComplication] [bit] NULL,
	[UnplannedPCI] [bit] NULL,
	[BleedingEvent] [bit] NULL,
	[TVR] [bit] NULL,
	[CVA] [bit] NULL,
	[UnplannedCABG] [bit] NULL,
	[Death] [bit] NULL,
	[BARC] [nvarchar](50) NULL,
	[BleedingSite] [nvarchar](128) NULL,
	[DischargeDate] [smalldatetime] NULL,
	[Time] [float] NULL,
	[DischargeStatus] [nvarchar](128) NULL,
	[ReferCardiacRehab] [bit] NULL,
	[CardiacDeath_D] [bit] NULL,
	[NoncardiacDeath_D] [bit] NULL,
	[Aspirin] [bit] NULL,
	[Statin] [bit] NULL,
	[OtherAntiplatelet] [bit] NULL,
	[OtherLipidLower] [bit] NULL,
	[FollowUpDate] [smalldatetime] NULL,
	[FollowUpStatus] [nvarchar](128) NULL,
	[CardiacDeath_FU] [bit] NULL,
	[NoncardiacDeath_FU] [bit] NULL,
	[NewMI] [bit] NULL,
	[NewStentThrombosis] [bit] NULL,
	[NewStroke] [bit] NULL,
	[StrokeType] [nvarchar](128) NULL,
	[CardiacRehosp] [bit] NULL,
	[ReadmissionDate] [smalldatetime] NULL,
	[PerformedPCI] [bit] NULL,
	[PerformedCABG] [bit] NULL,
	[PlannedPCI] [bit] NULL,
	[PlannedCABG] [bit] NULL,
	[PCI_TVR] [bit] NULL,
	[CABG_TVR] [bit] NULL,
	[PCI_TLR] [bit] NULL,
 CONSTRAINT [PK_StudyDM] PRIMARY KEY CLUSTERED 
(
	[DM_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[StudyR]    Script Date: 28/09/2020 10:07:49 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[StudyR](
	[StudyID] [int] IDENTITY(1,1) NOT NULL,
	[PatientID] [int] NOT NULL,
	[NonPedicledGraft] [bit] NULL,
	[PedicledRIMA] [bit] NULL,
	[PedicledLIMA] [bit] NULL,
	[CA] [bit] NULL,
	[LV_Gram] [nvarchar](50) NULL,
	[LeftHeartStudy] [bit] NULL,
	[RightHeartPressures] [bit] NULL,
	[OxygenSR] [bit] NULL,
	[CardiacOutput] [bit] NULL,
	[Aortogram] [nvarchar](50) NULL,
	[TAVR_Workup] [bit] NULL,
	[CineFemoral] [bit] NULL,
	[FluoroFemoral] [bit] NULL,
	[FemoralDSA] [bit] NULL,
	[IVUS] [bit] NULL,
	[TOE] [bit] NULL,
	[OCT] [bit] NULL,
	[TtE] [bit] NULL,
	[ICE] [bit] NULL,
	[iFR] [bit] NULL,
	[FFR] [bit] NULL,
	[CoronaryNotes] [nvarchar](128) NULL,
	[POBA_1_CA] [bit] NULL,
	[POBA_2_CA] [bit] NULL,
	[POBA_1_SVG] [bit] NULL,
	[POBA_2_SVG] [bit] NULL,
	[PedicledPOBA] [bit] NULL,
	[Stent1_CA] [bit] NULL,
	[Stent1_SVG] [bit] NULL,
	[Stents1_SVG] [bit] NULL,
	[Stents_Multi_SVG] [bit] NULL,
	[Stents1_CA] [bit] NULL,
	[PedicledStent] [bit] NULL,
	[InterventionalNotes] [nvarchar](128) NULL,
	[ASD] [bit] NULL,
	[VSD] [bit] NULL,
	[PDA] [bit] NULL,
	[PFO] [bit] NULL,
	[ParaLeak] [bit] NULL,
	[AorticValv] [bit] NULL,
	[MitralValv] [bit] NULL,
	[Tricuspid] [bit] NULL,
	[Pulmonary] [bit] NULL,
	[AorticRep] [bit] NULL,
	[MitralRep] [bit] NULL,
	[MitralClip] [bit] NULL,
	[OtherRep] [bit] NULL,
	[StructuralNotes] [nvarchar](128) NULL,
	[MyocardiumBio] [bit] NULL,
	[MyocardialSA] [bit] NULL,
	[EPS_2D] [bit] NULL,
	[EPS_2D_Details] [nvarchar](128) NULL,
	[EPS_3D] [bit] NULL,
	[EPS_3D_Details] [nvarchar](128) NULL,
	[RF_Ablation] [bit] NULL,
	[CryoAblation] [bit] NULL,
	[Cardioversion] [bit] NULL,
	[ElectroNotes] [nvarchar](128) NULL,
	[PPM_Type_1] [nvarchar](128) NULL,
	[PPM_Type_2] [nvarchar](128) NULL,
	[ICD_Type_1] [nvarchar](128) NULL,
	[ICD_Type_2] [nvarchar](128) NULL,
	[TPW_Type] [nvarchar](128) NULL,
	[ICM_Type] [nvarchar](128) NULL,
	[AntibacPouch] [nvarchar](50) NULL,
	[PacingNotes] [nvarchar](128) NULL,
	[IABP_Insertion] [bit] NULL,
	[IABP_Details] [nvarchar](128) NULL,
	[RenalDenervation] [bit] NULL,
	[Pericardiocentesis] [bit] NULL,
	[InsertVascClosure] [bit] NULL,
	[LimbVascular] [bit] NULL,
	[VisceralVascular] [bit] NULL,
	[EVAR] [bit] NULL,
	[PTA] [bit] NULL,
	[Vasc1Notes] [nvarchar](128) NULL,
	[Vasc3Notes] [nvarchar](128) NULL,
	[UpperOrRenal] [nvarchar](50) NULL,
	[LowerVascular] [bit] NULL,
	[ImplantPain] [bit] NULL,
	[OtherPain] [nvarchar](128) NULL,
	[NonCardiacNotes] [nvarchar](128) NULL,
	[Height] [float] NOT NULL,
	[Weight] [float] NOT NULL,
	[StudyDate] [smalldatetime] NOT NULL,
	[CCT] [nvarchar](128) NULL,
	[PrimaryOperator] [nvarchar](128) NOT NULL,
	[Radiographer] [nvarchar](128) NOT NULL,
	[StudyType] [nvarchar](128) NOT NULL,
	[DAP] [float] NULL,
	[SRDL] [float] NULL,
	[AirKerma] [float] NULL,
	[FluoroTime] [float] NULL,
	[Cardiac_0] [int] NULL,
	[Cardiac_1] [int] NULL,
	[Cardiac_2] [int] NULL,
	[Cardiac_3] [int] NULL,
	[Vascular_1] [int] NULL,
	[Vascular_2] [int] NULL,
	[Rotational_1] [int] NULL,
	[Rotational_2] [int] NULL,
	[SingleShots] [bit] NULL,
	[Acquisition] [nvarchar](50) NULL,
	[FluoroFlavour] [nvarchar](50) NOT NULL,
	[Contrast] [nvarchar](128) NULL,
	[Catheter_1] [nvarchar](128) NULL,
	[Catheter_2] [nvarchar](128) NULL,
	[Balloon_1] [nvarchar](128) NULL,
	[Balloon_2] [nvarchar](128) NULL,
	[Stent_1] [nvarchar](128) NULL,
	[Stent_2] [nvarchar](128) NULL,
	[AccessRoute1] [nvarchar](128) NULL,
	[Access1_Outcome] [nvarchar](50) NULL,
	[AccessRoute2] [nvarchar](128) NULL,
	[Access2_Outcome] [nvarchar](50) NULL,
 CONSTRAINT [PK_StudyR] PRIMARY KEY CLUSTERED 
(
	[StudyID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[StudyVMP]    Script Date: 28/09/2020 10:07:49 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[StudyVMP](
	[VMP_ID] [int] NOT NULL,
	[StudyID] [int] NOT NULL,
	[PatientID] [int] NOT NULL,
	[Diabetes] [bit] NULL,
	[PeripheralVasc] [bit] NULL,
	[PrevCABG] [bit] NULL,
	[PrevPCI] [bit] NULL,
	[ManageDiabetes] [nvarchar](128) NULL,
	[CABG_Date] [smalldatetime] NULL,
	[PCI_Date] [smalldatetime] NULL,
	[PreprocedureC] [smalldatetime] NULL,
	[CreatinineNA] [bit] NULL,
	[TestLV] [bit] NULL,
	[DateLV] [smalldatetime] NULL,
	[Echocardiogram] [bit] NULL,
	[Angiography] [bit] NULL,
	[MRI] [bit] NULL,
	[MPS] [bit] NULL,
	[InadequateLV] [bit] NULL,
	[ResultEF] [int] NULL,
	[DerivedEF] [bit] NULL,
	[EstimatedEF] [bit] NULL,
	[Estimated_eGFR] [float] NULL,
	[CockcroftGault] [bit] NULL,
	[Imported] [bit] NULL,
	[CardiogenicShock] [bit] NULL,
	[OOHA] [bit] NULL,
	[PreproceduralIntubation] [bit] NULL,
	[AnginaSymptom] [bit] NULL,
	[PCI_NSTEMI_7d] [bit] NULL,
	[PCI_UnstableA_7d] [bit] NULL,
	[PCI_Recent_ACS] [bit] NULL,
	[PCI_STEMI_12h] [bit] NULL,
	[PCI_STEMI_24h] [bit] NULL,
	[PCI_STEMI_UnstableL_24h] [bit] NULL,
	[PCI_STEMI_StableL_24h] [bit] NULL,
	[PCI_STEMI_NoL_7d] [bit] NULL,
	[PCI_STEMI_L_7d] [bit] NULL,
	[PCI_CardacA_CardiogenicS] [bit] NULL,
	[NoAnginaSymptom] [bit] NULL,
	[ACS] [bit] NULL,
	[ACS_STEMI] [bit] NULL,
	[ACS_NSTEMI] [bit] NULL,
	[ACS_UA] [bit] NULL,
	[QAS_Pres] [bit] NULL,
	[IHT_Pres] [bit] NULL,
	[SelfPres] [bit] NULL,
	[AdmittedPt] [bit] NULL,
	[ACS_Onset] [smalldatetime] NULL,
	[FirstMedContact] [smalldatetime] NULL,
	[FirstDiagnosticECG] [smalldatetime] NULL,
	[FirstDevTime] [float] NULL,
	[RequiredIntubation] [bit] NULL,
	[MechCirculatorySupport] [bit] NULL,
	[LesionLocation_1] [nvarchar](50) NULL,
	[InterventionOutcome_1] [bit] NULL,
	[InstentRestenosis_1] [bit] NULL,
	[StentThrombosis_1] [bit] NULL,
	[LesionLocation_2] [nvarchar](50) NULL,
	[InterventionOutcome_2] [bit] NULL,
	[InstentRestenosis_2] [bit] NULL,
	[StentThrombosis_2] [bit] NULL,
	[LabComplication] [nvarchar](128) NULL,
	[Dissection] [bit] NULL,
	[Perforation] [bit] NULL,
	[CVA_Stroke] [bit] NULL,
	[ValveDamage] [bit] NULL,
	[UnplannedDevImplant] [bit] NULL,
	[OtherComplication] [nvarchar](128) NULL,
	[PeriproceduralMI] [bit] NULL,
	[Death] [bit] NULL,
	[UnplannedCABG] [bit] NULL,
	[MajorBleeding] [bit] NULL,
	[LifeThreatArrhythmia] [bit] NULL,
	[LargeHaemotoma] [bit] NULL,
	[Tamponade] [bit] NULL,
	[Pnemothorax] [bit] NULL,
	[Pseudoaneurysm] [bit] NULL,
	[RequiredIntervention] [bit] NULL,
	[PacingLeadFailure] [bit] NULL,
 CONSTRAINT [PK_StudyVMP] PRIMARY KEY CLUSTERED 
(
	[VMP_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[StudyCS]  WITH CHECK ADD  CONSTRAINT [FK_StudyCS_Patients] FOREIGN KEY([PatientID])
REFERENCES [dbo].[Patients] ([PatientID])
GO
ALTER TABLE [dbo].[StudyCS] CHECK CONSTRAINT [FK_StudyCS_Patients]
GO
ALTER TABLE [dbo].[StudyCS]  WITH CHECK ADD  CONSTRAINT [FK_StudyCS_StudyR] FOREIGN KEY([StudyID])
REFERENCES [dbo].[StudyR] ([StudyID])
GO
ALTER TABLE [dbo].[StudyCS] CHECK CONSTRAINT [FK_StudyCS_StudyR]
GO
ALTER TABLE [dbo].[StudyDM]  WITH CHECK ADD  CONSTRAINT [FK_StudyDM_Patients] FOREIGN KEY([PatientID])
REFERENCES [dbo].[Patients] ([PatientID])
GO
ALTER TABLE [dbo].[StudyDM] CHECK CONSTRAINT [FK_StudyDM_Patients]
GO
ALTER TABLE [dbo].[StudyDM]  WITH CHECK ADD  CONSTRAINT [FK_StudyDM_StudyR] FOREIGN KEY([StudyID])
REFERENCES [dbo].[StudyR] ([StudyID])
GO
ALTER TABLE [dbo].[StudyDM] CHECK CONSTRAINT [FK_StudyDM_StudyR]
GO
ALTER TABLE [dbo].[StudyVMP]  WITH CHECK ADD  CONSTRAINT [FK_StudyVMP_Patients] FOREIGN KEY([PatientID])
REFERENCES [dbo].[Patients] ([PatientID])
GO
ALTER TABLE [dbo].[StudyVMP] CHECK CONSTRAINT [FK_StudyVMP_Patients]
GO
ALTER TABLE [dbo].[StudyVMP]  WITH CHECK ADD  CONSTRAINT [FK_StudyVMP_StudyR] FOREIGN KEY([StudyID])
REFERENCES [dbo].[StudyR] ([StudyID])
GO
ALTER TABLE [dbo].[StudyVMP] CHECK CONSTRAINT [FK_StudyVMP_StudyR]
GO
USE [master]
GO
ALTER DATABASE [WesCarrDB] SET  READ_WRITE 
GO
