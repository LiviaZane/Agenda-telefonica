var table = document.getElementById('myTable');           // document este fisierul din care a fost apelul....cautare.php
for(var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function() {
		var x = this.cells[0].innerHTML;                                // coloana 0 din table ...... id contact
		var xx = this.cells[1].innerHTML;                               // col 1 ..... nume
		var xxx = this.cells[2].innerHTML;                              // col 2 ..... prenume
		var xxxx = this.cells[3].innerHTML;                             // col 3 ..... telefon
		var y = document.getElementById('userid').value;                // valoarea elementului cu ID=userid din document
		location.replace("afisare.php?id="+x+"&user_id="+y+"&nume="+xxx+"&prenume="+xxxx+"&tel="+xx);
    };
};