<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] ,input[type=reset]{
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit],input[type=reset]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Add New Driver Form</h3>

<div class="container">
  <form method="POST" action="AddDriver.php" enctype="multipart/form-data" >
    

    <label for="dname">Name</label>
    <input type="text" id="dname" name="dName" placeholder=" Name.....">

    <label for="dcnic">CNIC</label>
    <input type="text" id="dcnic" name="dCNIC" placeholder="CNIC e.g 35202-1234123-2" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}">

    <label for="dphoneno">Mobile No</label>
    <input type="text" id="dphoneno" name="dPhoneNo" placeholder="0305-6668888" pattern="[0-9]{4}-[0-9]{7}">

    <label for="dsalary">Salary</label>
    <input type="text" id="dsalary" name="dSalary" placeholder="E.g 20000" pattern="[0-5]{5}">

    <label for="dcity">Home City</label>
    <input type="text" id="dcity" name="dCity" placeholder="City e.g Lahore">

     <label for="daddress">Home Address</label>
    <input type="text" id="daddress" name="dAddress" placeholder="City e.g 45F-MultanRoad-lahore-pakistan">


    <label for="dtype">Type</label>
    <select id="dtype" name="dType">
      <option value="Expert">Expert</option>
      <option value="Proficent">Proficent</option>
      <option value="Normal">Normal</option>
    </select>

    

    


     <label for="deducation">Education</label>
    <select id="deducation" name="dEducation">
      <option value="matric">Matric</option>
      <option value="Inter">Intermediate</option>
      <option value="Graduation">Graduation</option>
    </select>


    <label for="dstatus">Status</label>
    <select id="dstatus" name="dStatus">
      <option value="Active">Active</option>
      <option value="NonActive">Non-Active</option>
    </select>



    

    <input type="submit" name="submit" value="Add">
    <input type="reset" name="Reset" value="reset">
  </form>


</div>

</body>
</html>
