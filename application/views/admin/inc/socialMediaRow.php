<tr id="row_0" class="fields-row">
                                <input type="hidden" id="row_hidden0" name="row_hidden[]" value="0">
                                    <td>
                                    <div class="btn-group">
                                    
                                            <button type="button" class="btn btn-success icon-btn0"><i class="fa fa-ban"></i></button>

                                            <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" x-out-of-boundaries="" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                            <?php
                                            $i=0;
                                            foreach($icons as $ic=>$c)
                                            {
                                                echo '<a class="dropdown-item icon-item" href="#" no="'.$i.'" index="'.$ic.'" cval="'.$c.'"><i class="'.$c.'"></i> '.$ic.'</a>';
                                            }
                                            $i++;
                                            ?>
                                                
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden"  id="icon0" name="icon[]"  value=""> 
                                        <input type="text" class="form-control" id="title0" name="title[]" placeholder="Enter Title" value="">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="link0" name="link[]" placeholder="Enter URL" value="">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" row="0" class="del-sm btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                
                                </tr>