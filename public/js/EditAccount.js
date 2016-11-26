$(document).ready(function(){
	$('#btnSubmit').click(function(){
		arrRestriction = $('#restriction').val();
		licenseNumber = $('#licenseNumber').val();
		licenseTypes = $('#licenseTypes').val();
		firstName = $('#firstName').val();
		lastName = $('#lastName').val();
		middleName = $('#middleName').val();
		accountNumber = $('#accountNumber').val();
		userName = $('#userName').val();
		password = $('#password').val();

		$.ajax({
			type: "POST",
			url: "/driver/update",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');

				if (token) {
					  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				strDrivLicense: licenseNumber,
				strDrivAccNo: accountNumber,
				strDrivUname: userName,
				strDrivPword: password,
				strDrivFname: firstName,
				strDrivLname: lastName,
				strDrivMname: middleName,
				intLicenseType: licenseTypes,
				arrRestriction: arrRestriction
			},
			success: function(data){
				swal({
					title: "Success!",
					text: "Account Created",
					type: "success"
				},function(){

				});
			},
			error: function(data){
				var toastContent = $('<span>Error Occured. </span>');
				Materialize.toast(toastContent, 1500,'red', 'edit');

			}
		});//ajax
	});
});