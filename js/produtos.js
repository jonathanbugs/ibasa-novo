$(document).ready(function(){
	init();
	filtroLinha();
});


/* ============
   CHECKBOX
   ============ */
function filtroLinha(){
	$(".labelCheckbox input:checkbox").styleRadioCheckbox({
		classChecked:"inputCheckboxChecked",
		classFocus:"inputFocus"
	});
}