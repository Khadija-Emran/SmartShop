
<div class="modal fade" id="delete_confrim">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title basal-color delete_title" id="delete_title">Delete </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        <form method="post" action="">
          <div class="modal-body text-center">
              <img src="images/upload/profile.png" style="
                border-radius: 50%;
                width: 80px;
                height: 80px;
                border: 1px solid #3fbbaa;" class="delete_img" id="delete_img">
              <input  type="hidden" value="3" id="delete_ItemID" name="delete_ItemID">
              
              <h5  class=" basal-color delete_name mt-2" id="delete_name">name</h5>
              <hr>
              <p class="text-danger delete_message" id="delete_message">Do you want to delete this item ? </p>
          </div>
          <div class="modal-footer" style="padding: 5px;">
            <button  
                    type="submit" 
                    class="btn btn-danger final_delete"
                    name="delete"
                    >Delete</button> 
              
            <button type="button" class="btn text-light " data-dismiss="modal" style="background:#3fbbaa">cancel</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    
