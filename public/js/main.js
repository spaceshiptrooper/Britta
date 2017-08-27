/*

	BRITTA
	Author: spaceshiptrooper
	Copyright: 2017 Britta
	Version: 0.0.0.1
	File Last Updated: 6/27/2017 at 3:50 A.M.

*/

jQuery(document).ready(function($) {

	// Login

	$('.login-error').on('click', function() {

		$('.login-error').addClass('display-none');

	});

	$('.login-error').delay(5000).fadeOut('slow');

	$('.login-success').on('click', function() {

		$('.login-success').addClass('display-none');

	});

	$('.login-success').delay(5000).fadeOut('slow');

	// Register

	$('.register-error').on('click', function() {

		$('.register-error').addClass('display-none');

	});

	$('.register-error').delay(5000).fadeOut('slow');

	// Upload

	$('.upload-error').on('click', function() {

		$('.upload-error').addClass('display-none');

	});

	$('.upload-error').delay(5000).fadeOut('slow');

	$('.upload-success').on('click', function() {

		$('.upload-success').addClass('display-none');

	});

	$('.upload-success').delay(5000).fadeOut('slow');

	$('#file').on('change', function() {

		var file = $('#file').val();

		$('[data-js-label]').html('<span class="label">' + file + '</span>');

	});

	$('.toggle').on('click', function() {

		$('.toggle-container').toggle();

	});

	$('[data-placement="top"]').tooltip({align: 'top'});
	$('[data-placement="left"]').tooltip({align: 'left'});
	$('[data-placement="right"]').tooltip({align: 'right'});
	$('[data-placement="bottom"]').tooltip({align: 'bottom'});

});