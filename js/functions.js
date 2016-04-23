var kaeuferId;
var angebotsId;
var benutzerId;
//	# folgendes wird beim Laden ausgeführt
$(function(){
	
	//	# verstecken und initilaisieren der Validierungs Dialoge 
	 $("#dialog-angebotFehlt, #dialog-charnameFehlt, #dialog-klasseFehlt, #dialog-anameFehlt, #dialog-aPreisFehlt, #dialog-aInfoFehlt, #dialog-aRaidFehlt, #dialog-bnameFehlt, #dialog-bpasswort1Fehlt, #dialog-bpasswort2Fehlt, #dialog-bpasswortStimmennicht").dialog({
        modal: true,
        autoOpen: false,
        resizable: false,
        draggable: false,
        buttons: {
            Ok: function() {
                $(this).dialog("close");
            }
        }
    });
	
	$("#dialog-angebotErfolgreich, #dialog-kaeuferloeschenOk").dialog({
        modal: true,
        autoOpen: false,
        resizable: false,
        draggable: false,
        buttons: {
            Ok: function() {
                $(this).dialog("close");
				location.reload();
            }
        }
    });


	$("#dialog-angebotAngelegt, #dialog-angebotloeschenOk, #dialog-updateAngebot").dialog({
        modal: true,
        autoOpen: false,
        resizable: false,
        draggable: false,
        buttons: {
            Ok: function() {
                $(this).dialog("close");
				listAngebote();
            }
        }
    });
	
	$("#dialog-benutzerAngelegt, #dialog-benutzerloeschenOk").dialog({
        modal: true,
        autoOpen: false,
        resizable: false,
        draggable: false,
        buttons: {
            Ok: function() {
                $(this).dialog("close");
				listBenutzer();
            }
        }
    });
	
	
	
	$("#dialog-angebotBearbeiten").dialog({
		modal: true,
		autoOpen: false,
		height: 'auto',
		width: 1025,
		resizeable: false,
		draggable: false,
		buttons: {
			Speichern: function() {
				updateAngebot();
				$(this).dialog("close");
			}
		}
	});
	
	$("#dialog-message").dialog({
        autoOpen: false,
        modal: true,
        height: 150,
        width: 260,
        resizeable: false,
        buttons: {
            Ok: function() {
                $(this).dialog("close");
            }
        }
    });

	$("#dialog-neuesAngebot").dialog({
		modal: true,
		autoOpen: false,
		height: 'auto',
		width: 1025,
		resizeable: false,
		draggable: false,
		buttons: {
			Speichern: function() {
				validiereNeuesAngebot();
				$(this).dialog("close");
			}
		}
	});
	
	$("#dialog-neuerBenutzer").dialog({
		modal: true,
		autoOpen: false,
		height: 'auto',
		width: 1025,
		resizeable: false,
		draggable: false,
		buttons: {
			Speichern: function() {
				validiereNeuenBenutzer();
				$(this).dialog("close");
			}
		}
	});
	

	$("#dialog-angebotLoeschen").dialog({
		modal: true,
		autoOpen: false,
		height: 'auto',
		width: 260,
		resizeable: false,
		draggable: false,
		buttons: {
			Ja: function() {
				loescheAngebot(angebotsId);
				$(this).dialog("close");
			},
			Nein: function() {
				$(this).dialog("close");
			}
		}
	});

	$("#dialog-kaeuferLoeschen").dialog({
		modal: true,
		autoOpen: false,
		height: 'auto',
		width: 260,
		resizeable: false,
		draggable: false,
		buttons: {
			Ja: function() {
				loescheKaeufer(kaeuferId);
				$(this).dialog("close");
			},
			Nein: function() {
				$(this).dialog("close");
			}
		}
	});
	
	$("#dialog-benutzerLoeschen").dialog({
		modal: true,
		autoOpen: false,
		height: 'auto',
		width: 260,
		resizeable: false,
		draggable: false,
		buttons: {
			Ja: function() {
				loescheBenutzer(benutzerId);
				$(this).dialog("close");
			},
			Nein: function() {
				$(this).dialog("close");
			}
		}
	});
	
	$( document ).tooltip();
	
	
	
	$( "button#logout" ).click(function() {
		logout();
	}); 

	$( "button#angebotedit" ).click(function() {
		listAngebote();
	});

	$( "button#backtolist" ).click(function() {
		window.location.href = "index.php";
	}); 
	
	$( "button#usermanage" ).click(function() {
		listBenutzer();
	}); 
	
	
	

	
	$( "#raidfield" ).change(function() {
		loadAngebote();
	});
	
	$( "button#abschicken" ).click(function() {
		validiereKaeufer();
	}); 
	
	$( "#tablelist" ).on('click', 'img[id^="e"]', function() {
		angebotsId = this.id.substr(1);
		$("#dialog-angebotLoeschen").dialog("open");
	}); 
	
	$( "#tablelist" ).on('click', 'img[id^="g"]', function() {
		kaeuferId = this.id.substr(1);
		$("#dialog-kaeuferLoeschen").dialog("open");
	}); 

	$( "#tablelist" ).on('click', 'img[id^="d"]', function() {
		angebotsId = this.id.substr(1);
		var feld1_name = "a";
		feld1_name = feld1_name.concat(angebotsId);
		var feld2_preis = "b";
		feld2_preis = feld2_preis.concat(angebotsId);
		var feld3_info = "c";
		feld3_info = feld3_info.concat(angebotsId);
		bearbeiteAngebot(angebotsId);
	});
	
	$( "#tablelist" ).on('click', 'img[id^="c"]', function() {
		benutzerId = this.id.substr(1);
		$("#dialog-benutzerLoeschen").dialog("open");
	}); 
	
	

	$( "#tablelist" ).on('click', 'img#addAngebot', function() {
		angebot();
	});
	
	$( "#tablelist" ).on('click', 'img#addBenutzer', function() {
		benutzer();
	});
});



function login() {
	
	$.ajax ({
		type: "POST",
		url: "ajax/validateLogin.php",
		data: {
			username: $( "input#username" ).val(),
			passwort: $( "input#password" ).val()
		}
	}).done(function(data) {
		var re = new RegExp('\d*');
		if(data.match(re)) {
			var sessionID = data;
		}
		//$("body").html(data);
		//$("#dialog-login div").html(data);
		//$("#dialog-login").dialog("open");
	});
	
}


function logout() {
	window.location.href = "php/logout.php";
}



function loadAngebote() {
	selectIndex = $( "input[name=\"raidauswahl\"]:checked" ).val();
	$.ajax ({
		type: "POST",
		url: "ajax/loadAngebote.php",
		data: {
			id: selectIndex
		}
	}).done(function(data) {
		$( "#offers" ).html(data);
		
	});
}

function validiereKaeufer() {
	 if ($("#offers input[name=\"angebotauswahl\"]:checked").val() == undefined) {	 
        $("#dialog-angebotFehlt").dialog("open");
		return false
    } else if ($("div#sellform input#charname").val() == "") {
        $("#dialog-charnameFehlt").dialog("open");
		return false
    } else if ($("div#sellform select#class option:selected").val() == "") {
		$("#dialog-klasseFehlt").dialog("open");
		return false
	} else {
			saveKaeufer();
		}
	
}

function saveKaeufer() {
	$.ajax ({
		type: "POST",
		url: "ajax/saveKaeufer.php",
		data: {
			angebot: $( "div#sellform input[name=\"angebotauswahl\"]:checked" ).val(),
            charname: $( "div#sellform input#charname" ).val(),
            klasse: $( "div#sellform select#class option:selected" ).val()
		}
	}).done(function(data) {
		console.log(data);
		$("#dialog-angebotErfolgreich").dialog("open");
		
		
	});
}

function loescheKaeufer(kaeuferId) {
	
$.ajax({
		type: "POST",
		url: "ajax/dropKaeufer.php",
		data: { kaeuferid: kaeuferId }
	}).done(function(data) {
		$("#dialog-kaeuferloeschenOk").dialog("open");
	});
}

function listAngebote() {
	$.ajax ({
		type: "GET",
		url: "ajax/listAngebote.php"
	}).done(function(data) {
		$("#tablelist").html(data);
		
		
	});
}

function angebot() {
	$.ajax({
		type: "GET",
		url: "ajax/getAngebotsId.php"
	}).done(function(data) {
		$( "#dialog-neuesAngebot" ).dialog("open");	
	});
}

function validiereNeuesAngebot() {
	if ($("#dialog-neuesAngebot input#name").val() == "") {	 
        $("#dialog-anameFehlt").dialog("open");
		return false
    } else if ($("div#dialog-neuesAngebot input#preis").val() == "") {
        $("#dialog-aPreisFehlt").dialog("open");
		return false
    } else if ($("div#dialog-neuesAngebot input#info").val() == "") {
		$("#dialog-aInfoFehlt").dialog("open");
		return false
	} else if ($("div#dialog-neuesAngebot select#angebotRaid option:selected").val() == "") {
		$("#dialog-aRaidFehlt").dialog("open");
		return false 
	} else {
			saveAngebot();
		}
}

function saveAngebot() {
	$.ajax({
		type: "POST",
		url: "ajax/saveAngebot.php",
		data: { name: $( "div#dialog-neuesAngebot input#name" ).val(),
				preis: $( "div#dialog-neuesAngebot input#preis" ).val(),
				info: $( "div#dialog-neuesAngebot input#info" ).val(),
				raidId: $( "div#dialog-neuesAngebot select#angebotRaid option:selected" ).val()
		}
	}).done(function(data) {
		$( "div#dialog-angebotAngelegt" ).dialog("open");		
	});
}

function loescheAngebot(AngebotsId) {
	
$.ajax({
		type: "POST",
		url: "ajax/dropAngebot.php",
		data: { angebotsid: AngebotsId }
	}).done(function(data) {
		$("#dialog-angebotloeschenOk").dialog("open");
	});
}

function loescheBenutzer(benutzerId) {
	
$.ajax({
		type: "POST",
		url: "ajax/dropBenutzer.php",
		data: { benutzerid: benutzerId }
	}).done(function(data) {
		$("#dialog-benutzerloeschenOk").dialog("open");
	});
}

function bearbeiteAngebot(angebotsId) {
	$.ajax({
		type: "POST",
		url: "ajax/getAngebotDialog.php",
		data: {
			angebot_id: angebotsId
		}
	}).done(function(data) {
		$("div#dialog-angebotBearbeiten p").html(data);
		$("#dialog-angebotBearbeiten").dialog("open");
	
	});
}

function updateAngebot() {
	$.ajax({
		type: "POST",
		url: "ajax/updateAngebot.php",
		data: {
			angebotId: $( "div#dialog-angebotBearbeiten td#angebotId" ).text(),
			name: $( "div#dialog-angebotBearbeiten input#name" ).val(),
			preis: $( "div#dialog-angebotBearbeiten input#preis" ).val(),		
			info: $( "div#dialog-angebotBearbeiten input#info" ).val(),
			raidId: $( "div#dialog-angebotBearbeiten select#angebotRaid option:selected" ).val()
		}
	}).done(function(data) {
		$("#dialog-updateAngebot").dialog("open");
	});
}


function listBenutzer() {
	$.ajax ({
		type: "GET",
		url: "ajax/listBenutzer.php"
	}).done(function(data) {
		$("#tablelist").html(data);
		
		
	});
}

function benutzer() {
	$.ajax({
		type: "GET",
		url: "ajax/getBenutzerId.php"
	}).done(function(data) {
		$( "#dialog-neuerBenutzer" ).dialog("open");	
	});
}

function validiereNeuenBenutzer() {
	if ($("#dialog-neuerBenutzer input#benutzername").val() == "") {	 
        $("#dialog-bnameFehlt").dialog("open");
		return false
    } else if ($("div#dialog-neuerBenutzer input#passwort1").val() == "") {
        $("#dialog-bpasswort1Fehlt").dialog("open");
		return false
    } else if ($("div#dialog-neuerBenutzer input#passwort2").val() == "") {
		$("#dialog-bpasswort2Fehlt").dialog("open");
		return false
	} else if ($("div#dialog-neuerBenutzer input#passwort1").val() != $("div#dialog-neuerBenutzer input#passwort2").val()) {
		$("#dialog-bpasswortStimmennicht").dialog("open");
		return false
	} else {
			saveBenutzer();
		}
	
}

function saveBenutzer() {
	$.ajax({
		type: "POST",
		url: "ajax/saveBenutzer.php",
		data: { benutzername: $( "div#dialog-neuerBenutzer input#benutzername" ).val(),
				passwort: $( "div#dialog-neuerBenutzer input#passwort1" ).val()
		}
	}).done(function(data) {
		console.log(data);
		$( "div#dialog-benutzerAngelegt" ).dialog("open");		
	});
}