var selectedRow = null;
debugger;
function onFormSubmit(){
   if (validate()){
    var formData = readFormData();
    if (selectedRow == null){
    insertNewRecord(formData);
    //doAjax();
    var mysql = import('project.php');
    var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "test",

    
});

con.connect(function(err) {
   if (err) throw err;
 console.log("connected");
 });

 var sql = "INSERT INTO `test`.`projectdata` (`projectname`, `projectdesc`) VALUES (formdata.projectName,formdata.projectDesc);";
con.query(sql, function (err, result) {
    if (err) {
        throw err;
    }
    console.log(result.affectedRows + " record(s) updated");
  });
    }
    else
    updateRecord(formData)
    resetForm();
   }
}
 function readFormData(){
    var formData ={};
    formData["projectName"] = document.getElementById("projectName").value;
    formData["projectDesc"] = document.getElementById("projectDesc").value;
    return formData;
    
 }

 function insertNewRecord(data){
    var table = document.getElementById("projectList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.projectName;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.projectDesc;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = `<select id="mySelect" >
                           <option value="Completed" style="background-color:green;">Completed</option>
                           <option value="Inprogress" style="background-color:yellow;">Inprogress</option>
                           <option value="Issues" style="background-color:red;">Issue</option>
                       </select>`; //dropdown
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
 }

 function resetForm(){
    document.getElementById("projectName").value = "";
    document.getElementById("projectDesc").value = "";
    selectedRow = null;
 }

 function onEdit(td){
    selectedRow = td.parentElement.parentElement;
    document.getElementById("projectName").value = selectedRow.cells[0].innerHTML;
    document.getElementById("projectDesc").value = selectedRow.cells[1].innerHTML;
 }

 function updateRecord(formData){
    selectedRow.cells[0].innerHTML = formData.projectName;
    selectedRow.cells[1].innerHTML = formData.projectDesc;
 }

 function onDelete(td){
    if(confirm('Are you sure to delete this record ?')){
       row = td.parentElement.parentElement;
       document.getElementById("projectList").deleteRow(row.rowIndex);
       resetForm();
    }
 }

 function validate(){
   isValid = true;
   if(document.getElementById("projectName").value == ""){
      isValid = false;
      document.getElementById("projectNameValidationError").classList.remove("hide");
   } else {
      isValid = true;
      if(!document.getElementById("projectNameValidationError").classList.contains("hide"))
          document.getElementById("projectNameValidationError").classList.add("hide");
   }
   return isValid;
 }

 function doAjax(){
 $.ajax({
   type: "POST",
   url: "",
   data:document.getElementById("projectName").value &document.getElementById("projectDesc").value,
    success: function(msg){
     alert( "Data Saved: " + msg );
   }
 });
}
