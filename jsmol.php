<script src="/tsugi/mod/openochem/js/jquery-1.11.1.min.js"></script>
<script src="/tsugi/mod/openochem/js/jquery-ui.min.js"></script>
<script src="/tsugi/mod/openochem/js/kekule_libs/dist/kekule.js?modules=widget"></script>

<link rel="stylesheet" type="text/css" href="/tsugi/mod/openochem/js/kekule_libs/dist/themes/default/kekule.css" />
<link rel="stylesheet" type="text/css" href="/tsugi/mod/openochem/css/eocustom.css" />
<script type="text/javascript" src="/jmol/jsmol/JSmol.min.js"></script>
<!-- <script type="text/javascript" src="/tsugi/mod/openochem/js/bootstrap.min.js"></script> -->


<script type="text/javascript">
	delete Jmol._tracker;
	Jmol._isAsync = false;
                        // last update 2/18/2014 2:10:06 PM
                        var jmolApplet = "jmolApplet0";
                        var jmolApplet0; // set up in HTML table, below
                        jmol_isReady = function(applet) {
                        	//document.title = (applet._id + " - Jmol " + Jmol.___JmolVersion)
                        	Jmol._getElement(applet, "appletdiv").style.border="1px solid gray"
                        }		
                        var Info = {
                        	width: '100%',
                        	height: '100%',
                        	debug: false,
                        	zIndexBase: 1000,
	                        deferApplet: false,
	                        deferUncover: false,
	                        //deferApplet: true,
	                        color: "0xFFFFFF",
	                        addSelectionOptions: true,
	                        use: "HTML5",   // JAVA HTML5 WEBGL are all options
	                        j2sPath: "/jmol/jsmol/j2s", // this needs to point to where the j2s directory is.
	                        //jarPath: "/jmol/jsmol/java",// this needs to point to where the java directory is.
	                        //jarFile: "JmolAppletSigned.jar",
	                        //isSigned: true,
	                        script: "set zoomlarge false;set antialiasDisplay; frank OFF; set modelKitMode true; set StructureModifiedCallback 'StructureModifiedCallback'; set MessageCallback 'MessageCallback'; set PickCallback 'PickCallback'; set LoadStructCallback 'LoadStructCallback';",
	                        
	                        serverURL: "/jmol/jsmol/php/jsmol.php",
	                        readyFunction: jmol_isReady,
	                        disableJ2SLoadMonitor: true,
	                        disableInitialConsole: true,
	                        allowJavaScript: true
	                        //defaultModel: "$dopamine",
	                        //console: "none", // default will be jmolApplet0_infodiv, but you can designate another div here or "none"
	                    }
	                    $(document).ready(function() {
	                    	$("#jsmoldiv").html(Jmol.getAppletHtml("jmolApplet0", Info))
	                    })
	                    var modelEdit = true;
	                    var lastPrompt=0;
	                    var undos = ["", "", "", "", "" ,"", "", "", "", ""];
	                    var redos = ["", "", "", "", "" ,"", "", "", "", ""];
	                    var stereoToggle = 1;
	                    var modelBkg1 = "#0000ff";
	                    var fileType = "mol";
                       /* 
                        var initmolfile = "string\\n\
__Jmol-14_08271808363D 1   1.00000     0.00000     0\n\
Jmol version 14.7.5_2016.12.02  2016-12-02 07:03 EXTRACT: ({0:4})\n\
5  4  0  0  0  0              1 V2000\n\
0.00000   0.00000   0.00000 C   0  0  0  0  0  0\n\
0.63000   0.63000   0.63000 H   0  0  0  0  0  0\n\
-0.63000  -0.63000   0.63000 H   0  0  0  0  0  0\n\
-0.63000   0.63000  -0.63000 H   0  0  0  0  0  0\n\
0.63000  -0.63000  -0.63000 H   0  0  0  0  0  0\n\
1  5  1  0  0  0\n\
1  2  1  0  0  0\n\
3  1  1  0  0  0\n\
4  1  1  0  0  0\n\
M  END\n\
";
*/
function jmv(scpt) { return Jmol.evaluateVar(jmolApplet0, scpt); }
function exMod() { return jmstr("extractModel"); }
function jmstr(scpt) { return Jmol.getPropertyAsString(jmolApplet0,scpt); }
function trim(str) {
	if (str != null) { return str.replace(/^\s+|\s+$/g, ""); }
	return null;
}
function jmscript(scpt) { Jmol.script(jmolApplet0, scpt); }
function mkResetMin() {
        /*
	jmscript('unbind; unbind _wheelZoom; unbind "DOUBLE"; set picking off; set picking on; set allowRotateSelected false;');
	deleteModel = false; modelEdit = false; colorChange = false;
        */
	//writeHL("off");
}
function hasCharge() {
	var pos = Math.abs(jmv("{*}.formalCharge.max"));
	var neg = Math.abs(jmv("{*}.formalCharge.min"));
	if (pos > 0 || neg > 0) {
		return true;
	}
	return false;
}
/*
function writeHL(val) {
	if (val == "off") { val = ""; }
	else { val = "<a href=\"" + val + "\" target=\"_blank\"><span style=\"color:yellow\" onclick=\"writeHL('off')\">Click to Open Data</span></a>";}
	$("#hiddenLink").html(val);
}
*/    
function resetJsmol(){
        //jmscript('zap;');
/*
        console.log('HERE');
        var initmolfile = "string\\n\
        __Jmol-14_08271808363D 1   1.00000     0.00000     0\n\
        Jmol version 14.7.5_2016.12.02  2016-12-02 07:03 EXTRACT: ({0:4})\n\
        5  4  0  0  0  0              1 V2000\n\
        0.00000   0.00000   0.00000 C   0  0  0  0  0  0\n\
        0.63000   0.63000   0.63000 H   0  0  0  0  0  0\n\
        -0.63000  -0.63000   0.63000 H   0  0  0  0  0  0\n\
        -0.63000   0.63000  -0.63000 H   0  0  0  0  0  0\n\
        0.63000  -0.63000  -0.63000 H   0  0  0  0  0  0\n\
        1  5  1  0  0  0\n\
        1  2  1  0  0  0\n\
        3  1  1  0  0  0\n\
        4  1  1  0  0  0\n\
        M  END\n\
        ";
        
        
        
        molfile = '"model example" '+initmolfile+' end "model example"';
        */
        //console.log(molfile);
        //Jmol.script(jmolApplet0,' data '+molfile+'; show data;' );
        Jmol.script(jmolApplet0,'set modelKitMode true; zap;' );
}  
function getEchoColor(hexcolor){
	if (stereoToggle == 2) { return "white"; }
	hexcolor = hexcolor.replace("#", "");
	var r = parseInt(hexcolor.substr(0,2),16);
	var g = parseInt(hexcolor.substr(2,2),16);
	var b = parseInt(hexcolor.substr(4,2),16);
	var yiq = ((r*299)+(g*587)+(b*114))/1000;
	//return (yiq >= 128) ? 'black' : 'white';
	return 'blue';
}      
function echo(msg, loc, delay, font, color) {
	msg = (!msg) ? "" : msg;
	font = (!font) ? "18" : font;
	color = (!color) ? getEchoColor(modelBkg1) : color;
	delay = (!delay) ? "" : delay;
	loc = (!loc) ? "top left" : loc;
	menuItem = 0; globalVar = "";
	if (msg == 1) { msg = "Dbl-Click window to toggle p orbitals off/on... |" }
		if (msg == 2) { msg = "Dbl-Click window to toggle p orbitals off/on... |All orbitals for this model are loaded automatically |" }
			if (msg == "") { jmscript("set echo bottom left;echo ;set echo top left;echo ;"); return null;  }
		if (delay == "") {
			jmscript("mo off;set echo " + loc + ";font echo " + font + " serif;color echo  " + color + ";echo " + msg + " |;refresh;delay 0.1");
		}
		else {
			jmscript("mo off;set echo " + loc + ";font echo " + font + " serif;color echo  " + color + ";echo " + msg + " |;refresh;delay " + delay + ";echo ");
		}
		return null;
	}
	function typeCheck(typ) {
		var typAppend = "";
		if (typ == "ms" && (fileType == "mol" || fileType == "spartan")) {
			return true;
		}
		if (typ == "msp" && (fileType == "mol" || fileType == "spartan" || fileType == "pdb")) {
			return true;
		}
		if (typ == "ms1" && ckModNum() == 1 && (fileType == "mol" || fileType == "spartan")) {
			return true;
		}
		if (typ == "m1" && ckModNum() == 1 && fileType == "mol") {
			return true;
		}
		if (typ == "m" && fileType == "mol") {
			return true;
		}
		if (typ == "s" && fileType == "spartan") {
			return true;
		}
		if (typ == "c" && fileType == "cif") {
			return true;
		}
		if (typ == "p" && fileType == "pdb") {
			return true;
		}
		if (typ == "ms")  { typAppend = "molfiles and Spartan files."; }
		if (typ == "msp")  { typAppend = "molfiles, Spartan files, and pdb files."; }
		if (typ == "ms1")  { typAppend = "single molfiles and Spartan files."; }
		if (typ == "m1")  { typAppend = "single molfiles."; }
		if (typ == "m")  { typAppend = "molfiles."; }
		if (typ == "s")  { typAppend = "Spartan files."; }
		if (typ == "c")  { typAppend = "cif files."; }
		if (typ == "p")  { typAppend = "pdb files."; }
		bootbox.alert("<div style='font-size:18px'><h4>CheMagic Model Kit: Feature Not Available</h4><p style='text-align:left'>Sorry, this feature is only available for " + typAppend + "</p></div>");
		return false;
	}
	function promptAlt(t,v,c,d) {
		d = (!d)?"":d;
		keysOpen = true;
		bootbox.prompt({
			title: t,
			value: v,
			callback: function(result) {
				keysOpen = false;
				if (result === null) {
					bootbox.hideAll();
				} else {
					result = trim(result);
					if (c == "osrB") { bootbox.hideAll(); procBtn(d,result); }
				}
			}
		});
	}
	function osrP(cmd) {
		appendArg = "loadM";
		var t = "";
		var v = "I";
		if (cmd == "atomX") {
			t = "<div style='font-size:18px'><p style='text-align:left'>Enter the symbol for the atom that you would like to use as the click/replace atom:</p></div>";
			appendArg = "atomX";
		}
		var c = "osrB";
	//if (cmd == "loadM") { c = "osrL"; }
	promptAlt(t,v,c,appendArg);
}
function moveMol(num) {
	if (!typeCheck("msp")) { return null; }
	mkResetMin();
	jmscript("set antialiasDisplay false");
	if (num == 1) {
		echo("Dbl-click on screen cycles click-drag move mode: |Translate Model, Rotate Model, and Drag Atom |Active Mode: Click-Drag model to TRANSLATE model. |");
		jmscript('set picking off; set picking ON; set atomPicking true; set allowRotateSelected TRUE; set picking dragmolecule;bind "double" "javascript moveMol(2)";');
	}
	if (num == 2) {
		echo("Dbl-click on screen cycles click-drag move mode: |Translate Model, Rotate Model, and Drag Atom |Active Mode: Click-Drag model to ROTATE model. |");
		jmscript('set picking off; set picking ON;set atomPicking true;set picking dragmolecule;set allowRotateSelected TRUE;bind "drag" "_rotateselected";bind "double" "javascript moveMol(3)";');
	}
	if (num == 3) {
		echo("Dbl-click on screen cycles click-drag move mode: |Translate Model, Rotate Model, and Drag Atom |Active Mode: Click-Drag atom to DRAG atom. |");
		jmscript('set picking off; set picking ON; set picking DRAGATOM; bind "double" "javascript moveMol(1)";');
	}
	if (num == 4) {
		var ecStr = "Click a bond to select bond. Click-Drag in a vertical |direction on the left or right of the screen to rotate. |";
		echo(ecStr);
		// Color cpk is a kludge to fix problem associated with wheel zoom being off.
		var scpt = 'set Picking OFF;set Picking ON;set Picking ROTATEBOND;unbind "LEFT-DRAG";bind "LEFT-DRAG" "_rotateBranch";hover off;unbind "WHEEL";bind "WHEEL" "select *;color cpk"';
		jmscript(scpt);
	}
}
function deleteAtomBond(num) {
	//if (!typeCheck("msp")) { return null; }
	modelEdit = true;
	mkResetMin();
	//jmscript("set antialiasDisplay false");
	if (num == 1) {
		    echo("Dbl-click on screen cycles delete mode: |Delete Atom, Delete Bond |Active Mode: Click an atom to delete the atom.");
			jmscript('set picking off; set picking on; set atomPicking true;set picking DELETEATOM; bind "double" "javascript deleteAtomBond(2)";');
			console.log('herea');
	}
	if (num == 2) {
            //jmscript("hover off");
		    echo("Dbl-click on screen cycles delete mode: |Delete Atom, Delete Bond |Active Mode: Click a bond to delete the bond.");
			scpt = 'set picking assignBond_0; bind "double" "javascript deleteAtomBond(1)";';
			jmscript(scpt);
			jmscript('hover off;');
            //console.log('hereb');
	}
}
function procBtn(scpt,d) {
	d=(!d)?"":d;
	
	
	if (scpt == "rotateB") {
		if (!typeCheck("ms")) { return null; }
		mkResetMin();
		moveMol(4);
		return null;
	}
	
	
	
	if (scpt == "zoomI") {
		jmscript("zoom +20");
		return null;
	}
	if (scpt == "zoomO") {
		jmscript("zoom -20");
		return null;
	}
	if (scpt == "correctH") {
		mkResetMin();
		if (!typeCheck("m")) { return null; }
		jmscript('delete hydrogen;calculate hydrogens');
		echo("All H atoms have been deleted and recalculated. |Some H atoms may have to be added manually.");
		return null;
	}
	if (scpt == "optimizeM") { 
		mkResetMin();
		if (!typeCheck("m")) { return null; }
		if (hasCharge()) { echo("Optimization cannot be done on |molecules with formal charge."); return null; }
		echo("Minimization calculation in progress...");
		var atms = jmv("{*}.size");
		var stps = 50;
		if (atms > 15) { stps = 40; }
		if (atms > 30) { stps = 30; }
		if (atms > 50) { stps = 20; }
		scpt = "select xenon;select unselected;minimize steps " + stps + ";select *; wireframe 0.15; spacefill 23%; boundbox {*}; centerat boundbox; zoom 0; javascript echo(globalVar)";
		menuItem = 99;
		jmscript(scpt);
		return null;
	}
	if (scpt.substring(0, 4).toLowerCase() == "atom") {
		mkResetMin();
		modelEdit = true;
		//if (!typeCheck("m")) { return null; }
		var atom = scpt.replace(/atom/i,"").toString();
		if (atom == "0") {
			jmscript("set picking off; set picking on; set atomPicking true;set picking DELETEATOM");
			echo("Click an atom to delete the atom.");
			return null;
		}
		if (atom == "X") {
			atom = d;
		}
		scpt = "set picking off; set picking on; set atomPicking true;set picking assignatom_" + atom;
		jmscript(scpt);
		echo("Click an atom to replace it with " + atom + ". Also, click dragging |can be used to connect and add atoms.");
		return null;
	}
	if (scpt.substring(0, 4).toLowerCase() == "bond")  {
		mkResetMin();
		modelEdit = true;
		replacementBond = "";
		//if (!typeCheck("m")) { return null; }
		scpt = trim(scpt.replace(/bond/i, ""));
		if (scpt == "0" || scpt == "1" || scpt == "2"  || scpt == "3") {
			if (scpt == "1") { replacementBond = "single"; }
			if (scpt == "2") { replacementBond = "double"; }
			if (scpt == "3") { replacementBond = "triple"; }
			if (scpt == "0"){ replacementBond = "Click a bond to delete the bond"; }
			if (scpt != "0"){ replacementBond = "Click a bond to convert it to a " + replacementBond + " bond."; }
			echo(replacementBond);
			scpt = "set picking assignBond_" + scpt.toString();
			jmscript(scpt);
			jmscript("hover off");
		}
		return null;
	}
	
	
	
	if (scpt.substring(0, 4).toLowerCase() == "undo")  {
		mkResetMin();
		modelEdit = true;
		replacementBond = "";
		//if (!typeCheck("m")) { return null; }
		scpt = 'undo';
		jmscript(scpt);
		jmscript("hover off");
		//}
		return null;
	}
	
/*
	if (scpt == "correctH") {
		mkResetMin();
		if (!typeCheck("m")) { return null; }
		jmscript('delete hydrogen;calculate hydrogens');
		echo("All H atoms have been deleted and recalculated. |Some H atoms may have to be added manually.");
		return null;
	}
*/	
	return null;
	
	
	
}
function stashUndo(str) {
	str = (!str)?"":str;
	var x; var y;
	if (str != "") {
		x = undos.push(str);
	}
	else {
		x = undos.push(exMod());
	}
	y = undos.shift();
}
function LoadStructCallback(a,b,c,d,e,f,g,h) {
    console.log('LSCB');
    
    
    jmscript('set modelKitMode true;');
    console.log(modelEdit);
    console.log(spart1);
    if (modelEdit) { return null; }
/*
    if (spart1 == "OK" && spart2 == "OK") { fileType = "spartan"; spart1 = ""; spart2 = ""; jmscript("taVar1='';taVar2='';"); echo("Click GET Model File button to get |a loadable text file with MO and Charges."); return null;}
    if (spart1 == "1") { spart1 = "OK";jmscript("taVar1 = show('file');zap;load '@taVar1'"); }
    if (spart2 == "2") { spart2 = "OK";jmscript('taVar2 = show("file"); zap;var x = taVar1 + taVar2; load "@x"'); return null; }
    jmolApplet0._infoHeader = "&nbsp;Model Kit Mini Menu";
    fileType = jmv("_fileType").toLowerCase();
	console.log(fileType);
	var bkgClr = getEchoColor(modelBkg1);
	if (fileType.indexOf("spartan") > -1) { fileType = "spartan"; }
	else if (fileType.indexOf("mol") > -1 ) { fileType = "mol"; }
	else if (fileType.indexOf("cif") > -1 ) { fileType = "cif"; }
	else if (fileType.indexOf("pdb") > -1 ) { fileType = "pdb"; }
	else { fileType = "mol";  }
	if (fileType == "pdb") { jmscript('set preserveState FALSE; set platformSpeed 8; hover off; frank OFF; unbind _wheelZoom; unbind "DOUBLE"; centerat boundbox; zoom 100;select *;restrict bonds not selected;select not selected;cartoons on;color structure;javascript stashMol();'); }
	if (fileType == "mol") {jmscript('set preserveState FALSE; set platformSpeed 8; hover off; frank OFF; unbind _wheelZoom; unbind "DOUBLE"; select *; wireframe 0.15; spacefill 23%;boundbox {*}; color label pink; select formalCharge <> 0;label %C; centerat boundbox; zoom 100; display *;javascript stashMol();'); }
	if (fileType == "spartan") {
		var msg = "Charge & MO data. |Click MO & Charge buttons for additional instructions. |";
		if (jmstr("fileName").indexOf("__") > -1) { msg = "Charge data ONLY. |Click Charge button to rotate charge types. |"; }
		jmscript('set preserveState FALSE; set platformSpeed 8; hover off; frank OFF; unbind _wheelZoom; unbind "DOUBLE"; select *; wireframe 0.15; spacefill 23%;boundbox {*}; centerat boundbox; zoom 100; set echo bottom left;font echo 18 serif;color echo ' + bkgClr + '; echo This is a SPARTAN file with ' + msg + ';refresh;delay 0.1;javascript stashMol();');
		var add1;
		if (jmstr("fileContents").indexOf("HOMO_N =") > -1) {
			add1 = homoInts.push(parseInt(jmstr("fileContents").split("HOMO_N =")[1].split(".")[0].trim())); 
			var sub1 = homoInts.shift();
		}
		else {
			add1 = homoInts.push("homo");
			homoInts.shift();
		}
	}
	if (fileType == "cif") { jmscript('set preserveState FALSE; set platformSpeed 8; hover off; frank OFF; unbind _wheelZoom; unbind "DOUBLE"; select *; wireframe 0.15; spacefill 23%;boundbox {*};center; zoom 100; frame *; display *; set displayCellParameters true; set echo top right;font echo 18 serif;color echo ' + bkgClr + '; echo Use CIF Symop button to rotate |through symop views.  |;refresh;delay 0.1;javascript stashMol();'); }
	//mkResetMin();
*/
	return null;
}
function StructureModifiedCallback(x, y, z) {
    console.log('SMCB');
    if (y > 0) {
    	stashUndo();
    	jmscript('select *; wireframe 0.15; spacefill 23%; boundbox {*};centerat boundbox; color label pink;set fontsize 12; label ""; select formalCharge <> 0;label %C;unbind; unbind "DOUBLE"; javascript stashMol(), set modelKitMode true;');
    }
}
function PickCallback(x, y, z) {
        //console.log('PICKCB');
	//alert(x + "||||" + y + "||||" +  z);
	var scpt = ""; var at1 = ""; var at2 = "";
	if (y.indexOf("inverted") > -1) {
		scpt= 'select _H; label ""; select atomIndex=' + z + ';var x = {selected}.chirality; if (x == "") { x = "*" } if ({selected}.label != "R" && {selected}.label != "S" && {selected}.label != "*" && {selected}.label != "E" && {selected}.label != "Z") { select selected or connected(double, selected); label "."; label off} else { select selected or connected(double, selected); color label pink; set fontsize 10; background labels red; label @x;}'; mkResetMin();echo();stashMol();jmscript(scpt);
	}
	if (deleteModel) {
		at1 = y.split("#")[1].split(" ")[0];
		scpt = 'select within(branch, {atomno=1000}, {atomno=' + at1 + '});delete selected;';
		jmscript(scpt);
	}
	if (colorChange) {
		scpt = 'select {*}; calculate chirality; select atomIndex=_atomPicked; taVar1 = {selected}.chirality; if (taVar1 == "") { taVar1 = "*" }; if ({selected}.element=="H") { taVar1=ghpc() }; if ({selected}.label == "R" || {selected}.label == "S" || {selected}.label == "*" || {selected}.label == "E" || {selected}.label == "Z" || {selected}.label == "Hs" || {selected}.label == "Hr") {select selected or connected(double, selected); label "*"; label off;slab()} else { select selected or connected(double, selected); color label pink; set fontsize 10; background labels red; label @taVar1;slab()}';
		jmscript(scpt);
	}
}
function stashMol() { // Set chemagicTEMP for model transfer data
	if (stereoToggle == 2 ) { jmscript("stereo " + modelstereo + ";background " + stereoBkg + ";select hydrogen or carbon; select not selected;color label white;label %e; select formalCharge <> 0; label %C");  if (fileType == "cif" || fileType == "pdb") { jmscript('select *;label ""'); } }
	if (fileType == "spartan" || fileType == "cif" || fileType == "pdb") { return null; }
	if (storageOn && fileType != "pdb") {
		localStorage.setItem("chemagicTEMP", "!MODS!" + exMod());
		localStorage.setItem("chemagicTEMPS", "!MODSM!" + getSmiles());
	}
	return null;
}
function echo(msg, loc, delay, font, color) {
	msg = (!msg) ? "" : msg;
	font = (!font) ? "18" : font;
	color = (!color) ? getEchoColor(modelBkg1) : color;
	delay = (!delay) ? "" : delay;
	loc = (!loc) ? "top left" : loc;
	menuItem = 0; globalVar = "";
	if (msg == 1) { msg = "Dbl-Click window to toggle p orbitals off/on... |" }
		if (msg == 2) { msg = "Dbl-Click window to toggle p orbitals off/on... |All orbitals for this model are loaded automatically |" }
			if (msg == "") { jmscript("set echo bottom left;echo ;set echo top left;echo ;"); return null;  }
		if (delay == "") {
			jmscript("mo off;set echo " + loc + ";font echo " + font + " serif;color echo  " + color + ";echo " + msg + " |;refresh;delay 0.1");
		}
		else {
			jmscript("mo off;set echo " + loc + ";font echo " + font + " serif;color echo  " + color + ";echo " + msg + " |;refresh;delay " + delay + ";echo ");
		}
		return null;
	}
	function getUndo() {
		if (fileType != "mol") { return null; }
		modelEdit = false;
		var x; var y; var z; var stash;
		stash = undos.pop();
		z = undos.unshift("");
		if (stash == null || stash == undefined || stash == "") { return false; }
		x = redos.push(exMod());
		y = redos.shift();
		var molf1 = stash;
		jmscript('var molf2 = "' + molf1 + '"; load "@molf2"; hover off;');
		return true;
	}    
	function getRedo() {
		if (fileType != "mol") { return null; }
		var x; var y; var z; var stash;
		stash = redos.pop();
		z = redos.unshift("");
		if (stash == null || stash == undefined || stash == "") { return false; }
		x = undos.push(exMod());
		y = undos.shift();
		var molf1 = stash;
		jmscript('var molf2 = "' + molf1 + '"; load "@molf2"; hover off;');
		return true;
	}    
	function aClickActionP(num) {
		if (!typeCheck("ms") && num == 1) { return null; }
		if (fileType != "mol" && fileType != "spartan" && fileType != "cif") {
			var t = "<div style='font-size:18px'><h4>CheMagic Model Kit: Confirm</h4><p style='text-align:left'>A loaded PDB file will be lost with this action. SPARTAN and CIF files will be retained, but they will be converted to molfiles. Your currently loaded model is a " + fileType.toUpperCase() + " file.</p></div>";
			var c = "aClickActionB";
		confirmAlt(t,c,num); //Bootbox Confirm for non-molfile before aClickActionB
	} else { aClickActionB(num, true); } // Molfile to aClickActionB
	return null;
}
function aClickActionB(num, result) {
	num = parseInt(num);
	if (!result) { return null; }
	if (result && fileType != "pdb") { stashMol(); }
	if (result && storageOn) {
		localStorage["chemagicTEMP2"] = JSON.stringify(undos);
		localStorage["chemagicTEMP3"] = JSON.stringify(redos);
		if (num == 1) {
			stashFormula();
			if (isEmbedded()) { window.location.href = "acalculator.htm"; }
			else {window.location.href = "acalculator.htm?pid=on";}
		}
		if (num == 2) {
			//stashMol();
			if (isEmbedded()) {
				window.parent.iframeLoad(2);
				//window.location.href = "amodel.htm";
			}
			else {
				window.location.href = "amodel.htm";
			}
		}
		return null;
	}
	else {
		return null;
	}
	return null;
}          
</script>



<style type="text/css">
#jsmoldiv {
  width:90%;
  height:65vw;
  max-width:700px;
  max-height:500px;
  display:inline; /* needed for horiz. centering */
}
/*
#home {
  width: 46px;
  height: 44px;
  background: url(img_navsprites.gif) 0 0;
}
.icon-jsmol_newdoc {
    background-image: url(images/chemWidgetColor.png);
    background-position: -468px 0;
      width: 24px;
  height: 24px;
}
*/
</style>




 <div class="btn-toolbar" style="padding: 10px;" role="toolbar" aria-label="...">

<!--
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Clear Structure" style="margin-bottom: 4px;" class="btn btn-default" onclick='jmscript("zap;");' ><i class="fa fa-minus-square"></i></button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Undo" style="margin-bottom: 4px;" class="btn btn-default" onclick='getUndo()' >&#x21B6;</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Redo" style="margin-bottom: 4px;" class="btn btn-default" onclick='getRedo()' >&#x21B7;</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Zoom In" style="margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("zoomI")' ><i class="fa fa-search-plus"></i></button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Zoom Out" style="margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("zoomO")' ><i class="fa fa-search-minus"></i></button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Move molecule or atoms" style="margin-bottom: 4px;" class="btn btn-default" onclick='moveMol(1)' ><i class="fa fa-arrows-alt"></i> Move</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Delete Atom/Bond" style="margin-bottom: 4px;" class="btn btn-default" onclick='deleteAtomBond(1)' ><i class="fa fa-eraser"></i></button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Rotate about bond/Set dihedral angle" style="margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("rotateB")' >&#9215;</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" >
					<button type="button"  title="Add H's"  class="btn btn-default" onclick='procBtn("correctH")' ><i class="fa fa-plus"></i> H's</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Optimize Structure (MM)" style="margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("optimizeM")' ><i class="fa fa-motorcycle"></i></button></a>
			</div>
			
-->
	




          <div data-widget="Kekule.Widget.ButtonGroup">
            <button onclick='resetJsmol();' title="Clear Structure" data-widget="Kekule.Widget.RadioButton" class="GlyphButton K-Chem-NewDoc"></button>
            <button onclick='getUndo()' title="Undo" data-widget="Kekule.Widget.RadioButton" class="GlyphButton K-Chem-Undo"></button>
            <button onclick='getRedo()' title="Redo" data-widget="Kekule.Widget.RadioButton" class="GlyphButton K-Chem-Redo" ></button>
            <button onclick='procBtn("zoomI")' title="Zoom In" data-widget="Kekule.Widget.RadioButton" class="GlyphButton K-Chem-ZoomIn" ></button>
            <button onclick='procBtn("zoomO")' title="Zoom Out" data-widget="Kekule.Widget.RadioButton" class="GlyphButton K-Chem-ZoomOut" ></button>
            <button onclick='procBtn("rotateB")' title="Rotate about bond/Set dihedral angle" data-widget="Kekule.Widget.RadioButton"  class="GlyphButton K-Chem-RotateLeft" ></button>
            <button onclick='moveMol(1)' title="Move" data-widget="Kekule.Widget.RadioButton" class="Button" ><i class="fa fa-arrows-alt"></i></button>
            <button onclick='procBtn("correctH")' title="ADD Hydrogens" data-widget="Kekule.Widget.RadioButton" class="GlyphButton K-Chem-MolHideHydrogens"></button>
            <button onclick='procBtn("optimizeM")' title="Optimize Structure" data-widget="Kekule.Widget.RadioButton" class="Button"><i class="fa fa-motorcycle"></i></button>
          </div>





		</div>

<div style="width: 100%; white-space: nowrap; display: inline-block;">

          <div data-widget="Kekule.Widget.ButtonGroup" data-layout="2" style="vertical-align: top">
            <button onclick='deleteAtomBond(1)' title="Delete Atom/Bond" data-widget="Kekule.Widget.RadioButton"  class="GlyphButton K-Chem-BasicMolEraserIaController" ></button>
            <button onclick='procBtn("bond1")' title="Single Bond" data-widget="Kekule.Widget.RadioButton"  class="GlyphButton K-Chem-MolBondIaController-Single" ></button>
	    <button onclick='procBtn("bond2")'title="Double Bond" data-widget="Kekule.Widget.RadioButton"  class="GlyphButton K-Chem-MolBondIaController-Double" ></button>
	    <button onclick='procBtn("bond3")' title="Triple bond" data-widget="Kekule.Widget.RadioButton"  class="GlyphButton K-Chem-MolBondIaController-Triple" ></button>
            <button onclick='procBtn("atomH")' title="Add H" data-widget="Kekule.Widget.RadioButton"  class="Button atombtn" >H</button>
            <button onclick='procBtn("atomC")' title="Add C" data-widget="Kekule.Widget.RadioButton"  class="Button atombtn" >C</button>
            <button onclick='procBtn("atomN")' title="Add N" data-widget="Kekule.Widget.RadioButton"  class="Button atombtn" >N</button>
	    <button onclick='procBtn("atomO")' title="Add O" data-widget="Kekule.Widget.RadioButton"  class="Button atombtn" >O</button>
            <button onclick='procBtn("atomCl")' title="Add Cl" data-widget="Kekule.Widget.RadioButton"  class="Button atombtn" >Cl</button>
            <button onclick='procBtn("atomX")' title="Add other atoms" data-widget="Kekule.Widget.RadioButton"  class="Button atombtn" >X</button>
          </div>

<!--
		<div class="btn-group-vertical" style="padding: 10px; display: inline-block; float: left;" role="toolbar" aria-label="...">
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  style="width: 0px; width: 40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("atomH")' >H</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button" style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("atomC")' >C</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("atomN")' >N</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("atomO")' >O</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("atomCl")' >Cl</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("atomBr")' >Br</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Choose other element types" title = "Other Atoms" style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='osrP("atomX")' >X</button></a>
			</div>    
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Single bond" style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("bond1")' >-</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Double bond" style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("bond2")' >=</button></a>
			</div>
			<div  class="btn-group" role="group" aria-label="First group" >
				<a href="#" ><button type="button"  title="Triple bond" style="width:40px; margin-bottom: 4px;" class="btn btn-default" onclick='procBtn("bond3")' >&#8801;</button></a>
			</div>
		</div> -->

        <div id="jsmoldiv" style="display: inline-block; z-index: 400;"></div>
        <a href="javascript:Jmol.loadFileFromDialog(jmolApplet0)">Load File</a>


</div>
      <!-- <div class="col-xs-11"> -->


