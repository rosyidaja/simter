											
											<div class="row-fluid">
												<form id="form-edit-kandang" action="<?php echo base_url().'index.php/kandang/edit' ?>" name="form-edit-kandang" method="POST">
													<input type="hidden" name="id_kandang" id="id_kandang"  value="<?php echo $kandang->id_kandang; ?>" required/>
													<div class="control-group">
														<label class="control-label" for="form-field-1">Nama Kandang</label>

														<div class="controls">
															<input type="text" name="nama_kandang" id="nama_kandang"  value="<?php echo $kandang->nama_kandang; ?>" required/>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label" for="form-field-1">Kode Kandang</label>

														<div class="controls">
															<input type="text" name="kode_kandang" id="kode_kandang" value="<?php echo $kandang->kode_warna; ?>" required/>
														</div>
													</div>
													<div class="control-grup">
														<label class="control-label"  for="form-field-1">Status Kandang :&nbsp;</label>
														<?php 
														$status = $kandang->status;
														if($status == 'k'){ ?>
														<label style="float:left;">
															<input name="status" value="k" type="radio" checked />
															<span class="lbl">Kosong &nbsp;</span>
														</label>
														<label>
															<input name="status" value="t" type="radio" />
															<span class="lbl">Terpakai</span>
														</label>
														<?php }else{ ?>
															<label style="float:left;">
															<input name="status" value="k" type="radio"  />
															<span class="lbl">Kosong &nbsp;</span>
														</label>
														<label>
															<input name="status" value="t" type="radio" checked />
															<span class="lbl">Terpakai</span>
														</label>
														<?php }?>
													</div>
												</form>
												</div>

							