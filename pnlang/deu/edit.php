<?php
// ------------------------------------------------------------------------------------
// Translation for Mediashare module
// Translation by: Daniel Neugebauer / Thomas Smiatek / Carsten Volmer
// $Id$
// ------------------------------------------------------------------------------------

require_once('modules/mediashare/pnlang/deu/common.php');

define('_MSACCESSHELP',                 'Hier k�nnen unterschiedliche Zugriffsrechte f�r verschiedene Gruppen festgelegt werden.<ul><li>"Album hinzuf�gen" bedeutet, dass die Benutzer der gew�hlten Gruppe dem Album neue Unteralben hinzuf�gen k�nnen.</li><li>"Medien hinzuf�gen" bedeutet, dass die Benutzer neue Dateien hinzuf�gen k�nnen(*).</li><li>"Album bearbeiten" bedeutet, dass die Benutzer Titel, Beschreibung und andere Meta-Daten des Albums �ndern k�nnen.</li><li>"Datei bearbeiten" bedeutet, dass die Benutzer Titel, Beschreibung und andere Meta-Daten der Dateien �ndern k�nnen(*).</li></ul>Jeder Zugriffslevel (Hinzuf�gen/Bearbeiten) bietet ebenfalls Zugriff auf die "Bearbeiten"-Ansicht des Albums.  Benutzer k�nnen <em>immer</em> ihre eigenen Alben und Media-Dateien (unabh�ngig von den Zugriffsrechten) bearbeiten.<br /><br /><em>(*) Auch das Verschieben der Media-Dateien im Album ist m�glich.</em>');
define('_MSADDITEM',                    'Element hinzuf�gen');
define('_MSADDMEDIA',                   'Medien hinzuf�gen');
define('_MSADDMOREITEMS',               'Weitere hinzuf�gen');
define('_MSARRANGEITEMS',               'Medien neu ordnen');
define('_MSARRANGEHELP',                'Medien k�nnen per Drag-and-Drop neu geordnet werden. Das gew�nschte Ergebnis kann anschlie�end �ber die Schaltfl�che gespeichert werden.');
define('_MSCONTINUE',                   'Fortfahren');
define('_MSDELETE',                     'L�schen');
define('_MSDELETEITEM',                 'Element l�schen');
define('_MSDELETESELECTEDITEMS',        'Ausgew�hlte Elemente l�schen');
define('_MSEDITACCESS',                 'Zugriffsrechte bearbeiten');
define('_MSEDITITEM',                   'Element bearbeiten');
define('_MSEDITSELECTEDITEMS',          'Ausgew�hlte Medien bearbeiten');
define('_MSEDITMEDIA',                  'Medien bearbeiten');
define('_MSEXTAPPURL',                  'Externe Album-URL');
define('_MSEXTAPPURLHELP',              'Hier k�nnen Links zu externen Fotoalben, wie beispielsweise Flickr, Picasa oder SmugMug eingef�gt werden.');
define('_MSGROUP',                      'Gruppe');
define('_MSHEADERADDALBUM',             'Album hinzuf�gen');
define('_MSHEADERADDMEDIAITEMS',        'Medien zum Album hinzuf�gen');
define('_MSHEADERDELETEALBUM',          'Album l�schen');
define('_MSHEADERDELETEITEM',           'Element l�schen');
define('_MSHEADERDELETEMULTIITEMS',     'Medien l�schen');
define('_MSHEADEREDITALBUM',            'Album bearbeiten');
define('_MSHEADEREDITITEM',             'Element bearbeiten');
define('_MSHEADEREDITMULTIITEMS',       'Medien bearbeiten');
define('_MSHEADERMOVEALBUM',            'Album verschieben');
define('_MSHEADERMOVEMULTIITEMS',       'Ausgew�hlte Medien verschieben');
define('_MSLEVELUP',                    'Eine Ebene h�her');
define('_MSMAINMEDIAITEM',              'Hauptelement in diesem Album');
define('_MSMOVEALBUM',                  'Album verschieben');
define('_MSMOVESELECTEDITEMS',          'Ausgew�hlte Elemente verschieben');
define('_MSMOVESELECTEDTOALBUM',        'Neues Album f�r o.a. Element ausw�hlen');
define('_MSMOVETOALBUM',                'In Album verschieben');
define('_MSMUSTBELOGGEDIN',             'Es ist eine Anmeldung notwendig, um diese Funktion nutzen zu k�nnen.');
define('_MSNOMEDIAITEMS',               'Keine Medien vorhanden');
define('_MSNOMEDIASOURCES',             'Keine Quelle f�r Medientyp gefunden. Bitte in den Administrationsbereich wechseln und nach Quellen f�r Dateien suchen.');
define('_MSOPTUPLOAD',                  'Neue Datei (optional)');
define('_MSREFRESHAFTERUPLOAD',         'Eine Aktualisierung der folgenden Seite kann notwendig sein, wenn eine Datei ersetzt wurde!');
define('_MSSETMAINITEM',                'Hauptelement festlegen');
define('_MSSLIDESHOWITEM',              'Diashow');
define('_MSTEMPLATE',                   'Template');
define('_MSUPLOADERROR_INISIZE',        'Upload Fehler - Bildgr��e �berschreitet die serverseitige Upload-Grenze');
define('_MSUPLOADERROR_FORMSIZE',       'Upload Fehler - Bildgr��e �berschreitet die formularseitige Upload-Grenze');
define('_MSUPLOADERROR_PARTIAL',        'Upload Fehler - Bild wurde nur teilweise hochgeladen');
define('_MSUPLOADERROR_NOFILE',         'Upload Fehler - keine Datei hochgeladen');
define('_MSUPLOADERROR_UNKNOWN',        'Unbekannter Fehler beim Hochladen');
define('_MSUPLOADNO',                   'Kein Upload');
define('_MSVIEWITEM',                   'Medien-Element ansehen');

?>