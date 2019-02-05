<!DOCTYPE html>
<html>
<head>
	<title>upload photo</title>
</head>
<body>
    <form method="post" action="backend/trybackend.php" enctype="multipart/form-data">
    	<div class="row">
            <div class="col-6">
              <label>Interview Date</label>
              <input type="date" class="form-control" name="intdate" required/>
            </div>
            <div class="col-6">
              <label>Interviewed By</label>
              <input type="text" class="form-control" name="intby" required/>
            </div>
          </div><br/>

          <div class="row">
            <div class="col-12">
              <label>Child Photo:</label>
              <input type="file" name="photo" class="form-control" required>
            </div>
          </div><br/>

          <label>Person ID</label>
          <input type="number" name="pid" value="62" class="form-control">

          <input type="submit" name="submit" value="submit">
    </form>

</body>
</html>
