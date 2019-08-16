<!DOCTYPE html>

<html>

<head>

  <title>Bootstrap sortable table columns example</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

  <link rel="stylesheet" href="https://drvic10k.github.io/bootstrap-sortable/Contents/bootstrap-sortable.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.js"></script>

  <script src="https://drvic10k.github.io/bootstrap-sortable/Scripts/bootstrap-sortable.js"></script>

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">




<script>
let dataSet = [
["Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011-04-25", "$320,800", "Examples"],
["Garrett Winters", "Accountant", "Tokyo", "8422", "2011-07-25", "$170,750", "Examples"],
["Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009-01-12", "$86,000", "Examples"],
["Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012-03-29", "$433,060", "Examples"],
["Airi", "Accountant", "Tokyo", "5407", "2008-11-28", "$162,700", "Examples"],
["Brielle Williamson", "Integration Specialist", "New York", "4804", "2012-12-02",
"$372,000", "Examples"
],
["Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012-08-06", "$137,500", "Examples"],
["Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010-10-14", "$327,900", "Examples"],
["Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009-09-15", "$205,500", "Examples"],
["Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008-12-13", "$103,600", "Examples"],
["Jena Gaines", "Office Manager", "London", "3814", "2008-12-19", "$90,560", "Examples"],
["Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013-03-03", "$342,000", "Examples"],
["Charde Marshall", "Regional Director", "San Francisco", "6741", "2008-10-16", "$470,600", "Examples"],
["Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012-12-18", "$313,500", "Examples"],
["Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010-03-17", "$385,750", "Examples"],
["Michael Silva", "Marketing Designer", "London", "1581", "2012-11-27", "$198,500", "Examples"],
["Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010-06-09", "$725,000", "Examples"],
["Gloria Little", "Systems Administrator", "New York", "1721", "2009-04-10", "$237,500", "Examples"],
["Bradley Greer", "Software Engineer", "London", "2558", "2012-10-13", "$132,000", "Examples"],
["Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012-09-26", "$217,500", "Examples"],
["Jenette Caldwell", "Development Lead", "New York", "1937", "2011-09-03", "$345,000", "Examples"],
["Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009-06-25", "$675,000", "Examples"],
["Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011-12-12", "$106,450", "Examples"],
["Doris Wilder", "Sales Assistant", "Sidney", "3023", "2010-09-20", "$85,600", "Examples"],
["Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009-10-09", "$1,200,000", "Examples"],
["Gavin Joyce", "Developer", "Edinburgh", "8822", "2010-12-22", "$92,575", "Examples"],
["Jennifer Chang", "Regional Director", "Singapore", "9239", "2010-11-14", "$357,650", "Examples"],
["Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011-06-07", "$206,850",
"Examples"
],
["Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010-03-11", "$850,000",
"Examples"],
["Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011-08-14", "$163,000", "Examples"],
["Michelle House", "Integration Specialist", "Sidney", "2769", "2011-06-02", "$95,400", "Examples"],
["Suki Burks", "Developer", "London", "6832", "2009-10-22", "$114,500", "Examples"],
["Prescott Bartlett", "Technical Author", "London", "3606", "2011-05-07", "$145,000", "Examples"],
["Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008-10-26", "$235,500", "Examples"],
["Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011-03-09", "$324,050", "Examples"],
["Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009-12-09", "$85,675", "Examples"]
];

$('#ex2).DataTable({
data: dataSet,
columns: [{
title: "Name"
},
{
title: "Position"
},
{
title: "Office"
},
{
title: "Extn."
},
{
title: "Start date"
},
{
title: "Salary"
},
{
title: "Examples"
}
]
});

$('#ex2').mdbEditor({
rowEditor: true,
headerLength: 7,
evenTextColor: '#00ABE6',
oddTextColor: 'rgba(100,120,80, .6)',
bgEvenColor: '',
bgOddColor: '',
thText: '#00ABE6',
thBg: '',
});

$('.dataTables_length').addClass('bs-select');
</script>
</head>
<body>

<div class="wrapper-editor">

  <div class="d-flex justify-content-center buttons-wrapper flex-wrap my-3">
    <button id="" class="btn btn-sm btn-teal btn-rounded addNewColumn" disabled><i class="fas fa-toggle-on"></i></button>
    <button id="" class="btn btn-sm btn-info btn-rounded addNewRows" disabled><i class="fas fa-plus"></i></button>
    <button id="" class="btn btn-sm btn-mdb-color btn-rounded removeColumns" disabled> <i class="fas fa-toggle-off"></i></button>
  </div>
  <div class="closeByClick d-none"></div>
  <div class="showForm d-none" style="position: fixed; top: 25%; left:50%; transform: translate(-50%, -50%); z-index: 1100;">
    <form class="text-center border border-light p-5" style="background: white;">
      <button type="button" class="close position-relative button-x" style="top:-12%; right: -5%">
        <span aria-hidden="true" class="text-danger">×</span>
      </button>
      <h3 class="h3 my-3 text-danger font-weight-bold">Delete</h3>
      <hr class="mt-2 mb-3">
      <p class="text-center h5 py-2 pb-3">Are you sure to delete selected rows?</p>
      <hr class="mt-2 mb-3">
      <div class="d-flex justify-content-center buttonYesNoWrapper">
        <button type="button" class="btn btn-danger btnYes btn-sm" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-primary btnNo btn-sm" data-dismiss="modal">No</button>
      </div>
    </form>
  </div>
  <table id="ex2" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Extn.</th>
        <th>Start date</th>
        <th>Salary</th>
        <th>Examples</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Extn.</th>
        <th>Start date</th>
        <th>Salary</th>
        <th>Examples</th>
      </tr>
    </tfoot>
  </table>
</div>
</body>
</html>