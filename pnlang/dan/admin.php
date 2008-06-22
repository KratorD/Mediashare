<?php
// ------------------------------------------------------------------------------------
// Translation for PostNuke Mediashare module
// Translation by: Jorn Wildt
// ------------------------------------------------------------------------------------

require_once('modules/mediashare/pnlang/dan/common.php');

define('_MSALLOWTEMPLATEOVERRIDE', 'Tillad skabelonvalg pr. album?');
define('_MSAPPLYGLOBALTEMPLATE', 'S�t alle');
define('_MSAPPLYGLOBALTEMPLATECONFIRM', 'Overskriv alle albumskabeloner');
define('_MSDEFAULTALBUMTEMPLATE', 'Standard albumvisning');
define('_MSDEFAULTSLIDESHOWTEMPLATE', 'Standard diasshowvisning');
define('_MSDIRNOTWRITABLE', 'Kan ikke skrive til denne mappe.');
define('_MSGENERAL', 'Generelt');
define('_MSGENERALSETUP', 'Instillinger');
define('_MSIMPORT', 'Import');
define('_MSMEDIADIR', 'Mediefil upload mappe');
define('_MSMEDIADIRHELP', "Dette er mappen hvor dine mediefiler bliver gemt. S�rg for at navnet peger p� en mappe ved navn 'mediashare' i PostNukes top-mappe, og s�rg for at webserveren kan skrive til den.");
define('_MSMEDIAHANDLERS', 'Mediahandlers');
define('_MSMEDIAHANDLERSINFO', 'Listen herunder viser de mediahandlers der er til r�dighed. Disse plugins er ansvarlige for at lave frim�rkebilleder og vise de forskellige mediefiler du uploader.');
define('_MSMEDIASOURCES', 'Mediakilder');
define('_MSMEDIASOURCESINFO', 'Listen herunder viser de mediakilder der er til r�dighed. Disse plugins er ansvarlige for de forskellige m�der du kan uploade nye mediefiler.');
define('_MSMODULEDIR', 'Aktuel modulmappe.');
define('_MSOPENBASEDIR', 'Open-base mappe (PHP begr�nsning)');
define('_MSPLUGINS', 'Plugins');
define('_MSPREVIEWSIZE', 'Previewst�rrelse (pixels)');
define('_MSSCANFORPLUGINS', 'Skan efter plugins');
define('_MSSINGLEALLOWEDSIZE', 'Max. st�rrelse af et enkelt billede (kb)');
define('_MSTOTALALLOWEDSIZE', 'Max. tilladte lagerforbrug for en enkelt bruger (kb)');
define('_MSTHUMBNAILSIZE', 'Frim�rkest�rrelse (pixels)');
define('_MSTMPDIR', 'Arbejdsmappe');
define('_MSTMPDIRHELP', 'Dette er den mappe som Mediashare bruger til at gemme multimediefiler i n�r der arbejdes med dem. S�rg for at webserveren har skriveadgang til mappen.');
define('_MSVFSDBSELECTION', 'Filer i databasen');
define('_MSVFSDBSELECTIONHELP', 'Ved at gemme filer i databasen opn�r du en bedre sikkerhed og g�r det muligt at anvende flere webservere til den samme installation - p� bekostning af performance.');
define('_MSVFSDIRECTSELECTION', 'Filer p� harddisken');
define('_MSVFSDIRECTSELECTIONHELP', 'Ved at gemme filer p� harddiske forbedres performance p� beskostning af lidt sikkerhed.');
define('_MSSHARPEN', 'Aktiver forbedring af frim�rker');
define('_MSSHARPENHELP', 'Forbedring af frim�rker giver skarpere frim�rkebilleder p� bekostning af �get CPU-forbrug.');
define('_MSTHUMBNAILSTART', 'Vis frim�rker');
define('_MSTHUMBNAILSTARTHELP', 'Standard albumvisning kan enten v�re frim�rkevisning eller enkelt-billede-visning');

define('_MSREC_PAGETITLE', 'Genberegn frim�rker og previews');
define('_MSREC_INTRO', 'Genberegning af alle frim�rker og previews kan tage lang tid. Denne funktion anvender JavaScript til at genberegne et billede af gangen for at undg� PHP\'s begr�nsninger p� eksekveringstiden. Iframen til venstre bruges til kommunikation med serveren. Du kan f�lge fremgangen i b�de iframen og checkboks-listen forneden.');
define('_MSREC_RECALCULATE', 'Genberegn');
?>