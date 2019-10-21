<?php
require_once "../config.php";
// The Tsugi PHP API Documentation is available at:
// http://do1.dr-chuck.com/tsugi/phpdoc/namespaces/Tsugi.html
use \Tsugi\Core\Settings;
use \Tsugi\Core\LTIX;
// No parameter means we require CONTEXT, USER, and LINK
$LAUNCH = LTIX::requireData(); 
// Model
$p = $CFG->dbprefix;
// View
$OUTPUT->header();
$OUTPUT->bodyStart();
$OUTPUT->flashMessages();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>JSMol Model Kit</title>
    
    <style type="text/css">
    </style>

</head>

<body>


<?php include("jsmol.php"); ?>

<script>
   Jmol.jmolButton(jmolApplet0, "load ?","Load FILE")
   Jmol.jmolButton(jmolApplet0, "minimize;set minimizationSteps 500;set echo bottom;echo @{_minimizationEnergy} units", "Minimize energy")
   Jmol.jmolButton (jmolApplet0, "set picking dragMinimize;set minimizationSteps 500;set echo bottom;echo drag an atom...;set echo bottom left;echo @{_minimizationEnergy} units", "Allow movement of atoms!")
      </script>
    <br />
    <script type="text/javascript">
Jmol.jmolCheckbox(jmolApplet0, "spin on", "spin off", "spin", false)
document.write("&nbsp; &nbsp;")
Jmol.jmolCheckbox(jmolApplet0, "zoom 300", "zoom 100", "zoom", false)
document.write("&nbsp; &nbsp;")
Jmol.jmolLink(jmolApplet0, "select all;spacefill 20%; wireframe .15;", "ball&stick")
document.write("&nbsp; &nbsp;")
Jmol.jmolLink(jmolApplet0, "select all;spacefill off; wireframe .1;", "sticks")
document.write("&nbsp; &nbsp;")
Jmol.jmolLink(jmolApplet0, "select all;spacefill 100%; wireframe off;", "spacefill")
document.write("&nbsp; &nbsp;")
Jmol.jmolCheckbox(jmolApplet0, "select all;set showHydrogens FALSE;", "select all;set showHydrogens TRUE;", "show/hide hydrogens", false)
document.write("&nbsp; &nbsp;")
   Jmol.jmolButton(jmolApplet0, "draw pointgroup;","Show Pointgroup")
      </script>
    <br />
    <script>
	
		  Jmol.jmolCheckbox(jmolApplet0, "select all;calculate partialcharge;isosurface delete resolution 0 vdw color range all map MEP;", "select all;isosurface delete resolution 0 vdw color range all map MEP;isosurface OFF;",
	      "Electrostatic Surface");	
   
	     Jmol.jmolCheckbox(jmolApplet0, "select all;calculate partialcharge;isosurface delete resolution 0 vdw color range all map MEP translucent;", "select all;isosurface delete resolution 0 vdw color range all map MEP translucent;isosurface OFF;",
	      "Translucent Electrostatic Surface");
	
	      
	      	      	      	      </script>
  </p>
        
        <strong>More advanced (or even confusing!) options - these will only work for precalculated structures </strong>- load them in!<br />
        <script>
	      Jmol.jmolCheckbox(jmolApplet0, "select all;calculate partialcharge;mo homo;mo fill nomesh translucent;", "select all;mo homo;mo OFF;",
	      " HOMO &nbsp;");
		  Jmol.jmolCheckbox(jmolApplet0, "select all;calculate partialcharge;mo lumo;mo fill nomesh translucent;", "select all;mo lumo;mo OFF;",
	      " LUMO &nbsp;");
		 Jmol.jmolCheckbox(jmolApplet0, "select all;calculate partialcharge;backbone off;spacefill off;wireframe on;label %0.2P", "select all;backbone on;spacefill 20%;wireframe 0.1;label OFF;",
	      " Partial Atomic Charges (wireframe model)");
	      	      	      </script>

</body>
</html>

<?php
$OUTPUT->footer();

