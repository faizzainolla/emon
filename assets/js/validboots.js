//alert(baseurl+'assets/plugin/bootstrapvalidator/bootstrapValidator.min.js');
//  Dynamically load Bootstrap Validator Plugin
//  homepage: https://github.com/nghuuphuoc/bootstrapvalidator
//
function LoadBootstrapValidatorScript(callback){
	if (!$.fn.bootstrapValidator){
		$.getScript(baseurl+'assets/plugins/bootstrapvalidator/bootstrapValidator.min.js', callback);
	}
	else {
		if (callback && typeof(callback) === "function") {
			callback();
		}
	}
}



function chpassValidator(){
	$('#chpass').bootstrapValidator({
		
		fields: {
			passold: {
				validators: {
					notEmpty: {
						message: 'Field password lama  tidak boleh kosong'
					}
				}
			},

			passnew: {
				validators: {
					notEmpty: {
						message: 'Field password baru tidak boleh kosong'
					}

				}
			},
			vpassnew: {
				validators: {
					notEmpty: {
						message: 'Filed konfirmasi password tidak boleh kosong'
					},
					identical: {
						field: 'passnew',
						message: 'Konfirmasi password baru tidak cocok'
					}
				}
			}
		}
	});
}
//