<!-- Modal -->
<div id="signin_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign In</h4>
      </div>
      <div class="modal-body">
        <form id="signin_form">
            <div class="form-group">
              <label for="email">Login:</label>
              <input type="text" class="form-control" id="login" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>