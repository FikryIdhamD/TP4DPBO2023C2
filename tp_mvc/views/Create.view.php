<?php
class CreateView
{
    public function render()
    {
        $data = '<form method="post" action="index.php">

        <br><br>
        <div class="card">
  
          <div class="card-header bg-primary">
            <h1 class="text-white text-center"> Create New Member </h1>
          </div><br>
  
          <label for="name"> NAME: </label>
          <input type="text" name="name" class="form-control" required> <br>
  
          <label for="email"> EMAIL: </label>
          <input type="text" name="email" class="form-control" required> <br>
  
          <label for="phone"> PHONE: </label>
          <input type="text" name="phone" class="form-control" required> <br>
  
          <button class="btn btn-success" type="submit" name="add"> Submit </button><br>
          <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
  
        </div>
      </form>';
        $tpl = new Template("templates/create.html");
        $tpl->replace('FORM', $data);
        $tpl->write();
    }
}
