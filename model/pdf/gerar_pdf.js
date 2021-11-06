function CriaPDF() {
    var minhaTabela = document.getElementById('tabelapdf').innerHTML;
    var style = "<style>";
    style = style + "body {color: 'green';}";
    style = style + "table {width: 100%;font: 20px Arial;}";
    style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "color:'blue';";
    style = style + "</style>";
    // CRIA UM OBJETO WINDOW
    var win = window.open('', '', 'height=700,width=700');
    win.document.write('<html><head>');

    win.document.write(style);
    win.document.write('</head>');
    win.document.write('<body>');

    win.document.write(minhaTabela);
    win.document.write('</body></html>');
    win.document.close();
    win.print();
}