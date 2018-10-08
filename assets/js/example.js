
	(function(){

		'use strict';

		var dayNamesShort = ['Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di'];
		var monthNames = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
		var icon = '<svg viewBox="0 0 512 512"><polygon points="268.395,256 134.559,121.521 206.422,50 411.441,256 206.422,462 134.559,390.477 "/></svg>';

		var root = document.getElementById('picker');
		var dateInput = document.getElementById('date');
		var altInput = document.getElementById('alt');
		var doc = document.documentElement;

		function format ( dt ) {
			var m = dt.getMonth();
			switch (m) {
				case 0:
				m="01";
				break;
				case 1:
				m="02";
				break;
				case 2:
				m="03";
				break;
				case 3:
				m="04";
				break;
				case 4:
				m="05";
				break;
				case 5:
				m="06";
				break;
				case 6:
				m="07";
				break;
				case 7:
				m="08";
				break;
				case 8:
				m="09";
				break;
				case 9:
				m="10";
				break;
				case 10:
				m="11";
				break;
				case 11:
				m="12";
				break;
				default:
				m="00"
			}
			//return Picker.prototype.pad(dt.getDate()) + ' ' + monthNames[dt.getMonth()].slice(0,3) + ' ' + dt.getFullYear();
			//alert(dt.getFullYear() + '-' + m + '-' + dt.getDate());
			return Picker.prototype.pad(dt.getFullYear() + '-' + m + '-' + dt.getDate());
		}

		function show ( ) {
			root.removeAttribute('hidden');
		}

		function hide ( ) {
			root.setAttribute('hidden', '');
			doc.removeEventListener('click', hide);
		}

		function onSelectHandler ( ) {

			var value = this.get();

			if ( value.start ) {
				dateInput.value = value.start.Ymd();
				altInput.value = format(value.start);
				hide();
			}
		}

		var picker = new Picker(root, {
			min: new Date(dateInput.min),
			max: new Date(dateInput.max),
			icon: icon,
			twoCalendars: false,
			dayNamesShort: dayNamesShort,
			monthNames: monthNames,
			onSelect: onSelectHandler
		});

		root.parentElement.addEventListener('click', function ( e ) { e.stopPropagation(); });

		dateInput.addEventListener('change', function ( ) {

			if ( dateInput.value ) {
				alert(dateInput.value);
				picker.select(new Date(dateInput.value));
			} else {
				picker.clear();
			}
		});

		altInput.addEventListener('focus', function ( ) {
			altInput.blur();
			show();
			doc.addEventListener('click', hide, false);
		});

	}());
