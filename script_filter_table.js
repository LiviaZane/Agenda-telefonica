$(document).ready(function(){                           // document este fisierul din care a fost apelul....cautare.php
    $("#myInput").on("keyup", function() {              // se apeleaza function() cand se tasteaza in myInput ...din cautare.php
		var value = $(this).val().toLowerCase();                         // value stocheaza ce s-a tastat in myInput
		$("#myTab tr").filter(function() {                               // se filtreaza table myTable ... din cautare.php
	    	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1) // regaseste sirul value in celulele table ...this.text()
        });
    });
});