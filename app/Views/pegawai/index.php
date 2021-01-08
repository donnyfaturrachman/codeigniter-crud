<div class="right_col" role="main">
    <div class="">
        <!-- Success Upload -->
        <?php if(!empty(session()->getFlashdata('success'))){ ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success');?>
            </div>
        <?php } ?>
         
        <?php 
            $errors = $validation->getErrors();
            if(!empty($errors))
            {
                echo $validation->listErrors('my_list');
            }
        ?>
         

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus"></i> Tambah</button>
                
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php echo $table;?>                       
                    </tbody>
                </table>
                </div>
            </div>
            </div> 
        </div>

    
    </div>
</div>

<!-- modal -->
<div class="modal" id="formModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xs" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="frm_data" id="frm_data" method="POST" action="<?php echo base_url('pegawai/simpan');?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" required />
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required />
            </div>   
            <div class="form-group">
                <label>Gender</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gender1" value="1" checked>
                  <label class="form-check-label" for="gender1">
                    Pria
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gender2" value="2">
                  <label class="form-check-label" for="gender2">
                    Wanita
                  </label>
                </div>
            </div>
            <div class="form-group">
                <label>NIP</label>
                <input type="number" class="form-control" name="nip" id="nip" placeholder="nip" required />
            </div> 

            <div class="form-group">
                <label>Hobby</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="hobby" id="hobby1" value="1" checked>
                  <label class="form-check-label" for="hobby1">
                    Sepak Bola
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="hobby" id="hobby2" value="2">
                  <label class="form-check-label" for="hobby2">
                      Voli
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="hobby" id="hobby3" value="3">
                  <label class="form-check-label" for="hobby3">
                    Tenis Meja
                  </label>
                </div>
            </div> 

            <div class="form-group">
                <label for="path">Pilih Foto</label>
                <input type="file" class="form-control-file" id="path" name="path"  required/>
                <small>must PNG & JPG, file size max 1mb</small>
                <input type="text" class="form-control" name="paths" id="paths" placeholder="path" hidden />
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>