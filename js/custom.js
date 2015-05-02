$(function() {
	window.scrollReveal = new scrollReveal();
	"use strict";
	
	// PreLoader
	$(window).load(function() {
		$(".loader").fadeOut(400);
	});

	// Backstretchs
	$("#header").backstretch("images/5.jpg");
	$("#services").backstretch("images/5.jpg");
	
	// Countdown
	$('.countdown').downCount({
		date: '07/01/2015 12:00:00',
		offset: +10
	});			
    
});