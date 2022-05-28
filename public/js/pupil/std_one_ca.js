var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function(element, renderer) {
        return true;
    }
};

//margins.left, // x coord   margins.top, { // y coord
$('#btnExport').click(function() {
    doc.fromHTML($('#layoutSidenav_content').html(), 50, 50, {
        'width': 700,
        pageSize: 'A4',
        'elementHandlers': specialElementHandlers
    });
    doc.save('student_ca.pdf');
});