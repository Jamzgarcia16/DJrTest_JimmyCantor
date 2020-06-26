function imprimir() {
	alert("Generador de PDF ok! ");
	var canvas = document.getElementById('myBarChart');
	var canvas2 = document.getElementById('myPieChart');
	//var canvas3 = document.getElementById('myAreaChart');

	//var context = canvas.getContext('2d');
	//var ctx=canvas.getContext("2d");
    //ctx.fillStyle="#FFFFFF";
    //ctx.fillRect(0,0,180,175);
	// var imgData = canvas.toDataURL("image/jpeg", 1.0);
	// var imgData = canvas.toDataURL("image/jpeg", 1.0);
	var imgData = canvas.toDataURL({format: 'png'});
	var imgData2 = canvas2.toDataURL({format: 'png'});
	//var imgData3 = canvas3.toDataURL({format: 'png'});
	var pdf = new jsPDF();

	//$("#resumenContent").html(pdf.getFontList());
	pdf.setFont('Arial');
	pdf.setFontSize(18);
	pdf.text(20, 20, 'ESTADÍSTICAS DE BANERS');
	pdf.setFontSize(14);
	pdf.text(20, 30, 'Reporte estadístico de impresiones y accesos');
	pdf.roundedRect(19, 23, 170, 10, 1, 1, 'S');
	pdf.setFontSize(12);
	pdf.setFontSize(8);
	pdf.text(155, 275, 'Autor: Jamz Garcia ©');
	pdf.text(155, 279, 'Deveploment Sotfware SAS - 2018');
	pdf.addImage(imgData, 'JPEG', 15, 55);
	pdf.addImage(imgData2, 'JPEG', 70, 163);	pdf.autoPrint();
	//pdf.addImage(imgData3, 'JPEG', 70, 163);	pdf.autoPrint();
	pdf.save("Reporte_estadistica_banners.pdf");
}