<?php 
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
?>
<div class="wl-left-slide-bar">
    <div class="d-flex inner-colum">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-text-tab" data-bs-toggle="pill" data-bs-target="#v-pills-text"
                type="button" role="tab" aria-controls="v-pills-text" aria-selected="true">
                <i class="icon-Text"></i>
                <span>Text</span>
            </button>
            <button class="nav-link next" id="v-pills-background-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-background" type="button" role="tab" aria-controls="v-pills-background"
                aria-selected="false">
                <i class="icon-Background"></i>
                <span>Background</span>
            </button>
            <button class="nav-link" id="v-pills-templates-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-templates" type="button" role="tab" aria-controls="v-pills-templates"
                aria-selected="false">
                <i class="icon-Template"></i>
                <span>Templates</span>
            </button>
            <button class="nav-link" id="v-pills-elements-tab" data-bs-toggle="pill" data-bs-target="#v-pills-elements"
                type="button" role="tab" aria-controls="v-pills-elements" aria-selected="false">
                <i class="icon-Element"></i>
                <span>Elements</span>
            </button>
            <button class="nav-link" id="v-pills-uploads-tab" data-bs-toggle="pill" data-bs-target="#v-pills-uploads"
                type="button" role="tab" aria-controls="v-pills-uploads" aria-selected="false">
                <i class="icon-Upload-3"></i>
                <span>Uploads</span>
            </button>
            <button class="nav-link" id="v-pills-diseble-tab" data-bs-toggle="pill" data-bs-target="#v-pills-diseble"
                type="button" role="tab" aria-selected="false">
            </button>
        </div>
        <div class="tab-content" id="v-pills-tabcontent">
            <div class="tab-pane fade active show" id="v-pills-text" role="tabpanel" aria-labelledby="v-pills-text-tab"
                tabindex="0">
                <?php 
                    if(wp_is_mobile())
                    {    
                    ?>
                    <div class="mobail-tab">
                    <ul class="nav nav-tabs" id="mobaile-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="font-tab" data-bs-toggle="tab"
                                data-bs-target="#font-tab-pane" type="button" role="tab" aria-controls="font-tab-pane"
                                aria-selected="true">Font</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="align-tab" data-bs-toggle="tab"
                                data-bs-target="#align-tab-pane" type="button" role="tab" aria-controls="align-tab-pane"
                                aria-selected="false">Align</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane"
                                aria-selected="false">Color</button>
                        </li>
                        <li>
                            <button class="cloes-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="mobaile-tabcontent">
                        <div class="tab-pane fade show active" id="font-tab-pane" role="tabpanel"
                            aria-labelledby="font-tab" tabindex="0">
                            <div class="mobaile-form-text-edit">
                                <div class="form-group-outer">
                                    <div class="form-group">
                                        <div class="select-wrapper">
                                            <label for="font-family-select">Font</label>
                                            <select class="custom-select select-inner" id="fontFamily"
                                            onchange="changeFont()">
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="select-wrapper">
                                            <label>Size</label>
                                            <span class="customSelect-size">
                                            <input class="custom-select" type="number" id="fontSize" value="40" min="10"
                                                max="100" onchange="changeFontSize()">
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="align-tab-pane" role="tabpanel" aria-labelledby="align-tab"
                            tabindex="0">
                            <div class="mobaile-form-text-edit">
                                <div class="form-group-outer">
                                    <div class="form-group">
                                        <div class="select-wrapper">
                                            <label for="letters-spacing">Spacing</label>
                                            <input type="range" class="custom-range" id="letterSpacing" min="-150" max="150"
                                            value="0" step="1" onchange="changeLetterSpacing()">
                                        <span id="letterSpacingValue">0</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Style</label>
                                        <div class="text-style-btn-one">
                                            <a href="#" class="active" onclick="changeTextStyle('italic')"
                                                data-title="italic">
                                                <i class="icon-italic-font"></i>
                                            </a>
                                            <a href="#" data-title="underline" onclick="changeTextStyle('underline')">
                                                <i class="icon-Underline"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                            tabindex="0">
                            <div class="mobaile-form-text-edit">
                                <div class="form-group-fluid">
                                    <div class="mobail-color-piker">
                                        <label>Color</label>
                                        <div class="color-target">
                                            <div class="inner-colum">
                                                <input type="color" id="mobail-color-picker" class="color-target-inner"
                                                    value="#C95326">
                                                <span class="color-target-code">#C95326</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="color-squr">
                                        <span color-hex-value="#212528" style="background-color:#212528;"></span>
                                        <span color-hex-value="#B93B33" style="background-color:#B93B33;"></span>
                                        <span color-hex-value="#982E4F" style="background-color:#982E4F;"></span>
                                        <span color-hex-value="#7C3396" style="background-color:#7C3396;"></span>
                                        <span color-hex-value="#5B40BD" style="background-color:#5B40BD;"></span>
                                        <span color-hex-value="#3B4EBE" style="background-color:#3B4EBE;"></span>
                                        <span color-hex-value="#3163A7" style="background-color:#3163A7;"></span>
                                        <span color-hex-value="#347183" style="background-color:#347183;"></span>
                                        <span color-hex-value="#397E5D" style="background-color:#397E5D;"></span>
                                        <span color-hex-value="#478847" style="background-color:#478847;"></span>
                                        <span color-hex-value="#6A9330" style="background-color:#6A9330;"></span>
                                        <span color-hex-value="#D87E32" style="background-color:#D87E32;"></span>
                                        <span color-hex-value="#C95326" style="background-color:#C95326;"></span>
                                        <span color-hex-value="#343A3F" style="background-color:#343A3F;"></span>
                                        <span color-hex-value="#CF433C" style="background-color:#CF433C;"></span>
                                        <span color-hex-value="#B1345C" style="background-color:#B1345C;"></span>
                                        <span color-hex-value="#903DB0" style="background-color:#903DB0;"></span>
                                        <span color-hex-value="#6244D2" style="background-color:#6244D2;"></span>
                                        <span color-hex-value="#425AD4" style="background-color:#425AD4;"></span>
                                        <span color-hex-value="#3370BB" style="background-color:#3370BB;"></span>
                                        <span color-hex-value="#3D8296" style="background-color:#3D8296;"></span>
                                        <span color-hex-value="#439269" style="background-color:#439269;"></span>
                                        <span color-hex-value="#519E4D" style="background-color:#519E4D;"></span>
                                        <span color-hex-value="#77A735" style="background-color:#77A735;"></span>
                                        <span color-hex-value="#E19133" style="background-color:#E19133;"></span>
                                        <span color-hex-value="#D8642B" style="background-color:#D8642B;"></span>
                                        <span color-hex-value="#4A5055" style="background-color:#4A5055;"></span>
                                        <span color-hex-value="#DC4F45" style="background-color:#DC4F45;"></span>
                                        <span color-hex-value="#C5436D" style="background-color:#C5436D;"></span>
                                        <span color-hex-value="#A147C2" style="background-color:#A147C2;"></span>
                                        <span color-hex-value="#6A4BE0" style="background-color:#6A4BE0;"></span>
                                        <span color-hex-value="#4961E2" style="background-color:#4961E2;"></span>
                                        <span color-hex-value="#3F7CD2" style="background-color:#3F7CD2;"></span>
                                        <span color-hex-value="#4496AB" style="background-color:#4496AB;"></span>
                                        <span color-hex-value="#4CA57C" style="background-color:#4CA57C;"></span>
                                        <span color-hex-value="#5DAF58" style="background-color:#5DAF58;"></span>
                                        <span color-hex-value="#83B73D" style="background-color:#83B73D;"></span>
                                        <span color-hex-value="#EAA538" style="background-color:#EAA538;"></span>
                                        <span color-hex-value="#E7702D" style="background-color:#E7702D;"></span>
                                        <span color-hex-value="#889096" style="background-color:#889096;"></span>
                                        <span color-hex-value="#E75F59" style="background-color:#E75F59;"></span>
                                        <span color-hex-value="#D55580" style="background-color:#D55580;"></span>
                                        <span color-hex-value="#AE53D3" style="background-color:#AE53D3;"></span>
                                        <span color-hex-value="#7553EA" style="background-color:#7553EA;"></span>
                                        <span color-hex-value="#556DED" style="background-color:#556DED;"></span>
                                        <span color-hex-value="#4589E0" style="background-color:#4589E0;"></span>
                                        <span color-hex-value="#50A5BC" style="background-color:#50A5BC;"></span>
                                        <span color-hex-value="#56B68A" style="background-color:#56B68A;"></span>
                                        <span color-hex-value="#68BD63" style="background-color:#68BD63;"></span>
                                        <span color-hex-value="#92C842" style="background-color:#92C842;"></span>
                                        <span color-hex-value="#F1B440" style="background-color:#F1B440;"></span>
                                        <span color-hex-value="#EC8737" style="background-color:#EC8737;"></span>
                                        <span color-hex-value="#B1B7BE" style="background-color:#B1B7BE;"></span>
                                        <span color-hex-value="#ED7570" style="background-color:#ED7570;"></span>
                                        <span color-hex-value="#DD6E94" style="background-color:#DD6E94;"></span>
                                        <span color-hex-value="#C064E3" style="background-color:#C064E3;"></span>
                                        <span color-hex-value="#7F61F1" style="background-color:#7F61F1;"></span>
                                        <span color-hex-value="#637BF0" style="background-color:#637BF0;"></span>
                                        <span color-hex-value="#66AAF3" style="background-color:#66AAF3;"></span>
                                        <span color-hex-value="#69C8D8" style="background-color:#69C8D8;"></span>
                                        <span color-hex-value="#6FD7AD" style="background-color:#6FD7AD;"></span>
                                        <span color-hex-value="#77CD72" style="background-color:#77CD72;"></span>
                                        <span color-hex-value="#A3D74F" style="background-color:#A3D74F;"></span>
                                        <span color-hex-value="#F6C649" style="background-color:#F6C649;"></span>
                                        <span color-hex-value="#F19746" style="background-color:#F19746;"></span>
                                        <span color-hex-value="#CFD5DA" style="background-color:#CFD5DA;"></span>
                                        <span color-hex-value="#F08E8B" style="background-color:#F08E8B;"></span>
                                        <span color-hex-value="#E689AB" style="background-color:#E689AB;"></span>
                                        <span color-hex-value="#CD7BEB" style="background-color:#CD7BEB;"></span>
                                        <span color-hex-value="#A77BFA" style="background-color:#A77BFA;"></span>
                                        <span color-hex-value="#8695F5" style="background-color:#8695F5;"></span>
                                        <span color-hex-value="#87C8FA" style="background-color:#87C8FA;"></span>
                                        <span color-hex-value="#86E1F2" style="background-color:#86E1F2;"></span>
                                        <span color-hex-value="#8CE7CA" style="background-color:#8CE7CA;"></span>
                                        <span color-hex-value="#94DC9A" style="background-color:#94DC9A;"></span>
                                        <span color-hex-value="#B8E582" style="background-color:#B8E582;"></span>
                                        <span color-hex-value="#F8DC86" style="background-color:#F8DC86;"></span>
                                        <span color-hex-value="#F5B878" style="background-color:#F5B878;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }else{ ?>
                <div class="inner-container">
                    <div class="form-text-edit">
                        <form action="#">
                            <div class="form-group-fluid" style="display:none;">
                                <button class="btn btn-secondary btn-block canavas-editor-btn"
                                    onclick="addText('event')">Add Text</button>
                            </div>
                            <div class="form-group-fluid">
                                <label for="Text">Text</label>
                                <textarea name="" rows="3" placeholder="Enter Your Text" id="myTextarea"></textarea>
                            </div>
                            <div class="form-group-outer">
                                <div class="form-group">
                                    <div class="select-wrapper">
                                        <label class="canavas-label" for="fontFamily">Font:</label>
                                        <select class="custom-select select-inner" id="fontFamily"
                                            onchange="changeFont()">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-wrapper">
                                        <label class="canavas-label" for="fontWeight">Weight:</label>
                                        <select class="custom-select select-inner" id="fontWeight"
                                            onchange="changeFontWeight()">
                                            <option value="normal">Regular</option>
                                            <option value="500">Medium</option>
                                            <option value="600">Semi-Bold</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-outer">
                                <div class="form-group">
                                    <div class="select-wrapper">
                                        <label class="canavas-label" for="fontSize">Size:</label>
                                        <span class="customSelect-size">
                                            <input class="custom-select" type="number" id="fontSize" value="40" min="10"
                                                max="100" onchange="changeFontSize()">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-wrapper">
                                        <label>Align</label>
                                        <div class="text-style-btn">
                                            <a href="#" id="text-align-left" data-title="left"
                                                onclick="changeAlign('left')">
                                                <i class="fa-solid fa-align-left"></i>
                                            </a>
                                            <a href="#" id="text-align-center" class="active" data-title="center"
                                                onclick="changeAlign('center')">
                                                <i class="fa-solid fa-align-center"></i>
                                            </a>
                                            <a href="#" id="text-align-right" data-title="right"
                                                onclick="changeAlign('right')">
                                                <i class="fa-solid fa-align-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-outer">
                                <div class="form-group">
                                    <div class="select-wrapper">
                                        <label for="letterSpacing">Letter Spacing:</label>
                                        <input type="range" class="custom-range" id="letterSpacing" min="-150" max="150"
                                            value="0" step="1" onchange="changeLetterSpacing()">
                                        <span id="letterSpacingValue">0</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-wrapper">
                                        <label>Style</label>
                                        <div class="text-style-btn-one">
                                            <a href="#" class="active" onclick="changeTextStyle('italic')"
                                                data-title="italic">
                                                <i class="icon-italic-font"></i>
                                            </a>
                                            <a href="#" data-title="underline" onclick="changeTextStyle('underline')">
                                                <i class="icon-Underline"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-fluid">
                                <label>Color</label>
                                <div class="color-target">
                                    <div class="inner-colum">
                                        <input type="color" id="colorPicker" class="color-target-inner" value="#C95326">
                                        <span class="color-target-code">#C95326</span>
                                    </div>
                                </div>
                                <div class="color-squr">
                                    <span color-hex-value="#212528" style="background-color:#212528;"></span>
                                    <span color-hex-value="#B93B33" style="background-color:#B93B33;"></span>
                                    <span color-hex-value="#982E4F" style="background-color:#982E4F;"></span>
                                    <span color-hex-value="#7C3396" style="background-color:#7C3396;"></span>
                                    <span color-hex-value="#5B40BD" style="background-color:#5B40BD;"></span>
                                    <span color-hex-value="#3B4EBE" style="background-color:#3B4EBE;"></span>
                                    <span color-hex-value="#3163A7" style="background-color:#3163A7;"></span>
                                    <span color-hex-value="#347183" style="background-color:#347183;"></span>
                                    <span color-hex-value="#397E5D" style="background-color:#397E5D;"></span>
                                    <span color-hex-value="#478847" style="background-color:#478847;"></span>
                                    <span color-hex-value="#6A9330" style="background-color:#6A9330;"></span>
                                    <span color-hex-value="#D87E32" style="background-color:#D87E32;"></span>
                                    <span color-hex-value="#C95326" style="background-color:#C95326;"></span>
                                    <span color-hex-value="#343A3F" style="background-color:#343A3F;"></span>
                                    <span color-hex-value="#CF433C" style="background-color:#CF433C;"></span>
                                    <span color-hex-value="#B1345C" style="background-color:#B1345C;"></span>
                                    <span color-hex-value="#903DB0" style="background-color:#903DB0;"></span>
                                    <span color-hex-value="#6244D2" style="background-color:#6244D2;"></span>
                                    <span color-hex-value="#425AD4" style="background-color:#425AD4;"></span>
                                    <span color-hex-value="#3370BB" style="background-color:#3370BB;"></span>
                                    <span color-hex-value="#3D8296" style="background-color:#3D8296;"></span>
                                    <span color-hex-value="#439269" style="background-color:#439269;"></span>
                                    <span color-hex-value="#519E4D" style="background-color:#519E4D;"></span>
                                    <span color-hex-value="#77A735" style="background-color:#77A735;"></span>
                                    <span color-hex-value="#E19133" style="background-color:#E19133;"></span>
                                    <span color-hex-value="#D8642B" style="background-color:#D8642B;"></span>
                                    <span color-hex-value="#4A5055" style="background-color:#4A5055;"></span>
                                    <span color-hex-value="#DC4F45" style="background-color:#DC4F45;"></span>
                                    <span color-hex-value="#C5436D" style="background-color:#C5436D;"></span>
                                    <span color-hex-value="#A147C2" style="background-color:#A147C2;"></span>
                                    <span color-hex-value="#6A4BE0" style="background-color:#6A4BE0;"></span>
                                    <span color-hex-value="#4961E2" style="background-color:#4961E2;"></span>
                                    <span color-hex-value="#3F7CD2" style="background-color:#3F7CD2;"></span>
                                    <span color-hex-value="#4496AB" style="background-color:#4496AB;"></span>
                                    <span color-hex-value="#4CA57C" style="background-color:#4CA57C;"></span>
                                    <span color-hex-value="#5DAF58" style="background-color:#5DAF58;"></span>
                                    <span color-hex-value="#83B73D" style="background-color:#83B73D;"></span>
                                    <span color-hex-value="#EAA538" style="background-color:#EAA538;"></span>
                                    <span color-hex-value="#E7702D" style="background-color:#E7702D;"></span>
                                    <span color-hex-value="#889096" style="background-color:#889096;"></span>
                                    <span color-hex-value="#E75F59" style="background-color:#E75F59;"></span>
                                    <span color-hex-value="#D55580" style="background-color:#D55580;"></span>
                                    <span color-hex-value="#AE53D3" style="background-color:#AE53D3;"></span>
                                    <span color-hex-value="#7553EA" style="background-color:#7553EA;"></span>
                                    <span color-hex-value="#556DED" style="background-color:#556DED;"></span>
                                    <span color-hex-value="#4589E0" style="background-color:#4589E0;"></span>
                                    <span color-hex-value="#50A5BC" style="background-color:#50A5BC;"></span>
                                    <span color-hex-value="#56B68A" style="background-color:#56B68A;"></span>
                                    <span color-hex-value="#68BD63" style="background-color:#68BD63;"></span>
                                    <span color-hex-value="#92C842" style="background-color:#92C842;"></span>
                                    <span color-hex-value="#F1B440" style="background-color:#F1B440;"></span>
                                    <span color-hex-value="#EC8737" style="background-color:#EC8737;"></span>
                                    <span color-hex-value="#B1B7BE" style="background-color:#B1B7BE;"></span>
                                    <span color-hex-value="#ED7570" style="background-color:#ED7570;"></span>
                                    <span color-hex-value="#DD6E94" style="background-color:#DD6E94;"></span>
                                    <span color-hex-value="#C064E3" style="background-color:#C064E3;"></span>
                                    <span color-hex-value="#7F61F1" style="background-color:#7F61F1;"></span>
                                    <span color-hex-value="#637BF0" style="background-color:#637BF0;"></span>
                                    <span color-hex-value="#66AAF3" style="background-color:#66AAF3;"></span>
                                    <span color-hex-value="#69C8D8" style="background-color:#69C8D8;"></span>
                                    <span color-hex-value="#6FD7AD" style="background-color:#6FD7AD;"></span>
                                    <span color-hex-value="#77CD72" style="background-color:#77CD72;"></span>
                                    <span color-hex-value="#A3D74F" style="background-color:#A3D74F;"></span>
                                    <span color-hex-value="#F6C649" style="background-color:#F6C649;"></span>
                                    <span color-hex-value="#F19746" style="background-color:#F19746;"></span>
                                    <span color-hex-value="#CFD5DA" style="background-color:#CFD5DA;"></span>
                                    <span color-hex-value="#F08E8B" style="background-color:#F08E8B;"></span>
                                    <span color-hex-value="#E689AB" style="background-color:#E689AB;"></span>
                                    <span color-hex-value="#CD7BEB" style="background-color:#CD7BEB;"></span>
                                    <span color-hex-value="#A77BFA" style="background-color:#A77BFA;"></span>
                                    <span color-hex-value="#8695F5" style="background-color:#8695F5;"></span>
                                    <span color-hex-value="#87C8FA" style="background-color:#87C8FA;"></span>
                                    <span color-hex-value="#86E1F2" style="background-color:#86E1F2;"></span>
                                    <span color-hex-value="#8CE7CA" style="background-color:#8CE7CA;"></span>
                                    <span color-hex-value="#94DC9A" style="background-color:#94DC9A;"></span>
                                    <span color-hex-value="#B8E582" style="background-color:#B8E582;"></span>
                                    <span color-hex-value="#F8DC86" style="background-color:#F8DC86;"></span>
                                    <span color-hex-value="#F5B878" style="background-color:#F5B878;"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="v-pills-background" role="tabpanel" aria-labelledby="v-pills-background-tab"
                tabindex="0">
                <?php 
                    if(wp_is_mobile())
                    {    
                    ?>
                    <div class="mobail-tab">
                    <ul class="nav nav-tabs" id="mobaile-Tab-one" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="background-tab" data-bs-toggle="tab"
                                data-bs-target="#background-tab-pane" type="button" role="tab"
                                aria-controls="background-tab-pane" aria-selected="false">Color</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link " id="patterns-tab" data-bs-toggle="tab"
                                data-bs-target="#patterns-tab-pane" type="button" role="tab"
                                aria-controls="patterns-tab-pane" aria-selected="true">Patterns</button>
                        </li>
                        <li>
                            <button class="cloes-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="mobaile-tabcontent-one">
                        <div class="tab-pane fade  show active" id="background-tab-pane" role="tabpanel"
                            aria-labelledby="background-tab" tabindex="0">
                            <div class="mobaile-form-text-edit">
                                <div class="form-group-fluid">
                                    <div class="mobail-color-piker">
                                        <label>Color</label>
                                        <div class="color-target">
                                            <div class="inner-colum">
                                                <input type="color" id="mobail-color-picker-background"
                                                    class="color-target-inner" value="#C95326">
                                                <span class="color-target-code">#C95326</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="color-squr-1">
                                    <span color-hex-value="#212528" style="background-color:#212528;"></span>
                                    <span color-hex-value="#B93B33" style="background-color:#B93B33;"></span>
                                    <span color-hex-value="#982E4F" style="background-color:#982E4F;"></span>
                                    <span color-hex-value="#7C3396" style="background-color:#7C3396;"></span>
                                    <span color-hex-value="#5B40BD" style="background-color:#5B40BD;"></span>
                                    <span color-hex-value="#3B4EBE" style="background-color:#3B4EBE;"></span>
                                    <span color-hex-value="#3163A7" style="background-color:#3163A7;"></span>
                                    <span color-hex-value="#347183" style="background-color:#347183;"></span>
                                    <span color-hex-value="#397E5D" style="background-color:#397E5D;"></span>
                                    <span color-hex-value="#478847" style="background-color:#478847;"></span>
                                    <span color-hex-value="#6A9330" style="background-color:#6A9330;"></span>
                                    <span color-hex-value="#D87E32" style="background-color:#D87E32;"></span>
                                    <span color-hex-value="#C95326" style="background-color:#C95326;"></span>
                                    <span color-hex-value="#343A3F" style="background-color:#343A3F;"></span>
                                    <span color-hex-value="#CF433C" style="background-color:#CF433C;"></span>
                                    <span color-hex-value="#B1345C" style="background-color:#B1345C;"></span>
                                    <span color-hex-value="#903DB0" style="background-color:#903DB0;"></span>
                                    <span color-hex-value="#6244D2" style="background-color:#6244D2;"></span>
                                    <span color-hex-value="#425AD4" style="background-color:#425AD4;"></span>
                                    <span color-hex-value="#3370BB" style="background-color:#3370BB;"></span>
                                    <span color-hex-value="#3D8296" style="background-color:#3D8296;"></span>
                                    <span color-hex-value="#439269" style="background-color:#439269;"></span>
                                    <span color-hex-value="#519E4D" style="background-color:#519E4D;"></span>
                                    <span color-hex-value="#77A735" style="background-color:#77A735;"></span>
                                    <span color-hex-value="#E19133" style="background-color:#E19133;"></span>
                                    <span color-hex-value="#D8642B" style="background-color:#D8642B;"></span>
                                    <span color-hex-value="#4A5055" style="background-color:#4A5055;"></span>
                                    <span color-hex-value="#DC4F45" style="background-color:#DC4F45;"></span>
                                    <span color-hex-value="#C5436D" style="background-color:#C5436D;"></span>
                                    <span color-hex-value="#A147C2" style="background-color:#A147C2;"></span>
                                    <span color-hex-value="#6A4BE0" style="background-color:#6A4BE0;"></span>
                                    <span color-hex-value="#4961E2" style="background-color:#4961E2;"></span>
                                    <span color-hex-value="#3F7CD2" style="background-color:#3F7CD2;"></span>
                                    <span color-hex-value="#4496AB" style="background-color:#4496AB;"></span>
                                    <span color-hex-value="#4CA57C" style="background-color:#4CA57C;"></span>
                                    <span color-hex-value="#5DAF58" style="background-color:#5DAF58;"></span>
                                    <span color-hex-value="#83B73D" style="background-color:#83B73D;"></span>
                                    <span color-hex-value="#EAA538" style="background-color:#EAA538;"></span>
                                    <span color-hex-value="#E7702D" style="background-color:#E7702D;"></span>
                                    <span color-hex-value="#889096" style="background-color:#889096;"></span>
                                    <span color-hex-value="#E75F59" style="background-color:#E75F59;"></span>
                                    <span color-hex-value="#D55580" style="background-color:#D55580;"></span>
                                    <span color-hex-value="#AE53D3" style="background-color:#AE53D3;"></span>
                                    <span color-hex-value="#7553EA" style="background-color:#7553EA;"></span>
                                    <span color-hex-value="#556DED" style="background-color:#556DED;"></span>
                                    <span color-hex-value="#4589E0" style="background-color:#4589E0;"></span>
                                    <span color-hex-value="#50A5BC" style="background-color:#50A5BC;"></span>
                                    <span color-hex-value="#56B68A" style="background-color:#56B68A;"></span>
                                    <span color-hex-value="#68BD63" style="background-color:#68BD63;"></span>
                                    <span color-hex-value="#92C842" style="background-color:#92C842;"></span>
                                    <span color-hex-value="#F1B440" style="background-color:#F1B440;"></span>
                                    <span color-hex-value="#EC8737" style="background-color:#EC8737;"></span>
                                    <span color-hex-value="#B1B7BE" style="background-color:#B1B7BE;"></span>
                                    <span color-hex-value="#ED7570" style="background-color:#ED7570;"></span>
                                    <span color-hex-value="#DD6E94" style="background-color:#DD6E94;"></span>
                                    <span color-hex-value="#C064E3" style="background-color:#C064E3;"></span>
                                    <span color-hex-value="#7F61F1" style="background-color:#7F61F1;"></span>
                                    <span color-hex-value="#637BF0" style="background-color:#637BF0;"></span>
                                    <span color-hex-value="#66AAF3" style="background-color:#66AAF3;"></span>
                                    <span color-hex-value="#69C8D8" style="background-color:#69C8D8;"></span>
                                    <span color-hex-value="#6FD7AD" style="background-color:#6FD7AD;"></span>
                                    <span color-hex-value="#77CD72" style="background-color:#77CD72;"></span>
                                    <span color-hex-value="#A3D74F" style="background-color:#A3D74F;"></span>
                                    <span color-hex-value="#F6C649" style="background-color:#F6C649;"></span>
                                    <span color-hex-value="#F19746" style="background-color:#F19746;"></span>
                                    <span color-hex-value="#CFD5DA" style="background-color:#CFD5DA;"></span>
                                    <span color-hex-value="#F08E8B" style="background-color:#F08E8B;"></span>
                                    <span color-hex-value="#E689AB" style="background-color:#E689AB;"></span>
                                    <span color-hex-value="#CD7BEB" style="background-color:#CD7BEB;"></span>
                                    <span color-hex-value="#A77BFA" style="background-color:#A77BFA;"></span>
                                    <span color-hex-value="#8695F5" style="background-color:#8695F5;"></span>
                                    <span color-hex-value="#87C8FA" style="background-color:#87C8FA;"></span>
                                    <span color-hex-value="#86E1F2" style="background-color:#86E1F2;"></span>
                                    <span color-hex-value="#8CE7CA" style="background-color:#8CE7CA;"></span>
                                    <span color-hex-value="#94DC9A" style="background-color:#94DC9A;"></span>
                                    <span color-hex-value="#B8E582" style="background-color:#B8E582;"></span>
                                    <span color-hex-value="#F8DC86" style="background-color:#F8DC86;"></span>
                                    <span color-hex-value="#F5B878" style="background-color:#F5B878;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="patterns-tab-pane" role="tabpanel" aria-labelledby="patterns-tab"
                            tabindex="0">
                            <div class="mobaile-form-text-edit">
                                <div class="background-images-piker">
                                    <div class="inner-container">
                                        <div class="bg-img-iteam active">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-1.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-2.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-3.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-4.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-5.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-6.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-7.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-8.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-9.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-10.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-11.jpg" alt="BackGround-image">
                                        </div>
                                        <div class="bg-img-iteam">
                                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg-12.jpg" alt="BackGround-image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }else{ ?>
                <div class="inner-container">
                    <div class="form-text-edit">
                        <form action="#">
                            <div class="form-group-fluid">
                                <label>Color</label>
                                <div class="color-target">
                                    <div class="inner-colum">
                                        <input type="color" id="color-picker-background" class="color-target-inner"
                                            value="#C95326">
                                        <span class="color-target-code">#C95326</span>
                                    </div>
                                </div>
                                <div class="color-squr-1">
                                    <span color-hex-value="#212528" style="background-color:#212528;"></span>
                                    <span color-hex-value="#B93B33" style="background-color:#B93B33;"></span>
                                    <span color-hex-value="#982E4F" style="background-color:#982E4F;"></span>
                                    <span color-hex-value="#7C3396" style="background-color:#7C3396;"></span>
                                    <span color-hex-value="#5B40BD" style="background-color:#5B40BD;"></span>
                                    <span color-hex-value="#3B4EBE" style="background-color:#3B4EBE;"></span>
                                    <span color-hex-value="#3163A7" style="background-color:#3163A7;"></span>
                                    <span color-hex-value="#347183" style="background-color:#347183;"></span>
                                    <span color-hex-value="#397E5D" style="background-color:#397E5D;"></span>
                                    <span color-hex-value="#478847" style="background-color:#478847;"></span>
                                    <span color-hex-value="#6A9330" style="background-color:#6A9330;"></span>
                                    <span color-hex-value="#D87E32" style="background-color:#D87E32;"></span>
                                    <span color-hex-value="#C95326" style="background-color:#C95326;"></span>
                                    <span color-hex-value="#343A3F" style="background-color:#343A3F;"></span>
                                    <span color-hex-value="#CF433C" style="background-color:#CF433C;"></span>
                                    <span color-hex-value="#B1345C" style="background-color:#B1345C;"></span>
                                    <span color-hex-value="#903DB0" style="background-color:#903DB0;"></span>
                                    <span color-hex-value="#6244D2" style="background-color:#6244D2;"></span>
                                    <span color-hex-value="#425AD4" style="background-color:#425AD4;"></span>
                                    <span color-hex-value="#3370BB" style="background-color:#3370BB;"></span>
                                    <span color-hex-value="#3D8296" style="background-color:#3D8296;"></span>
                                    <span color-hex-value="#439269" style="background-color:#439269;"></span>
                                    <span color-hex-value="#519E4D" style="background-color:#519E4D;"></span>
                                    <span color-hex-value="#77A735" style="background-color:#77A735;"></span>
                                    <span color-hex-value="#E19133" style="background-color:#E19133;"></span>
                                    <span color-hex-value="#D8642B" style="background-color:#D8642B;"></span>
                                    <span color-hex-value="#4A5055" style="background-color:#4A5055;"></span>
                                    <span color-hex-value="#DC4F45" style="background-color:#DC4F45;"></span>
                                    <span color-hex-value="#C5436D" style="background-color:#C5436D;"></span>
                                    <span color-hex-value="#A147C2" style="background-color:#A147C2;"></span>
                                    <span color-hex-value="#6A4BE0" style="background-color:#6A4BE0;"></span>
                                    <span color-hex-value="#4961E2" style="background-color:#4961E2;"></span>
                                    <span color-hex-value="#3F7CD2" style="background-color:#3F7CD2;"></span>
                                    <span color-hex-value="#4496AB" style="background-color:#4496AB;"></span>
                                    <span color-hex-value="#4CA57C" style="background-color:#4CA57C;"></span>
                                    <span color-hex-value="#5DAF58" style="background-color:#5DAF58;"></span>
                                    <span color-hex-value="#83B73D" style="background-color:#83B73D;"></span>
                                    <span color-hex-value="#EAA538" style="background-color:#EAA538;"></span>
                                    <span color-hex-value="#E7702D" style="background-color:#E7702D;"></span>
                                    <span color-hex-value="#889096" style="background-color:#889096;"></span>
                                    <span color-hex-value="#E75F59" style="background-color:#E75F59;"></span>
                                    <span color-hex-value="#D55580" style="background-color:#D55580;"></span>
                                    <span color-hex-value="#AE53D3" style="background-color:#AE53D3;"></span>
                                    <span color-hex-value="#7553EA" style="background-color:#7553EA;"></span>
                                    <span color-hex-value="#556DED" style="background-color:#556DED;"></span>
                                    <span color-hex-value="#4589E0" style="background-color:#4589E0;"></span>
                                    <span color-hex-value="#50A5BC" style="background-color:#50A5BC;"></span>
                                    <span color-hex-value="#56B68A" style="background-color:#56B68A;"></span>
                                    <span color-hex-value="#68BD63" style="background-color:#68BD63;"></span>
                                    <span color-hex-value="#92C842" style="background-color:#92C842;"></span>
                                    <span color-hex-value="#F1B440" style="background-color:#F1B440;"></span>
                                    <span color-hex-value="#EC8737" style="background-color:#EC8737;"></span>
                                    <span color-hex-value="#B1B7BE" style="background-color:#B1B7BE;"></span>
                                    <span color-hex-value="#ED7570" style="background-color:#ED7570;"></span>
                                    <span color-hex-value="#DD6E94" style="background-color:#DD6E94;"></span>
                                    <span color-hex-value="#C064E3" style="background-color:#C064E3;"></span>
                                    <span color-hex-value="#7F61F1" style="background-color:#7F61F1;"></span>
                                    <span color-hex-value="#637BF0" style="background-color:#637BF0;"></span>
                                    <span color-hex-value="#66AAF3" style="background-color:#66AAF3;"></span>
                                    <span color-hex-value="#69C8D8" style="background-color:#69C8D8;"></span>
                                    <span color-hex-value="#6FD7AD" style="background-color:#6FD7AD;"></span>
                                    <span color-hex-value="#77CD72" style="background-color:#77CD72;"></span>
                                    <span color-hex-value="#A3D74F" style="background-color:#A3D74F;"></span>
                                    <span color-hex-value="#F6C649" style="background-color:#F6C649;"></span>
                                    <span color-hex-value="#F19746" style="background-color:#F19746;"></span>
                                    <span color-hex-value="#CFD5DA" style="background-color:#CFD5DA;"></span>
                                    <span color-hex-value="#F08E8B" style="background-color:#F08E8B;"></span>
                                    <span color-hex-value="#E689AB" style="background-color:#E689AB;"></span>
                                    <span color-hex-value="#CD7BEB" style="background-color:#CD7BEB;"></span>
                                    <span color-hex-value="#A77BFA" style="background-color:#A77BFA;"></span>
                                    <span color-hex-value="#8695F5" style="background-color:#8695F5;"></span>
                                    <span color-hex-value="#87C8FA" style="background-color:#87C8FA;"></span>
                                    <span color-hex-value="#86E1F2" style="background-color:#86E1F2;"></span>
                                    <span color-hex-value="#8CE7CA" style="background-color:#8CE7CA;"></span>
                                    <span color-hex-value="#94DC9A" style="background-color:#94DC9A;"></span>
                                    <span color-hex-value="#B8E582" style="background-color:#B8E582;"></span>
                                    <span color-hex-value="#F8DC86" style="background-color:#F8DC86;"></span>
                                    <span color-hex-value="#F5B878" style="background-color:#F5B878;"></span>
                                </div>
                            </div>
                            <div class="background-images-edit active">
                                <span class="hedding">Patterns</span>
                                <span class="background-slidedown-icon">
                                    <i class="icon-chevron-down"></i>
                                </span>
                            </div>
                            <div class="background-images-piker">
                                <div class="inner-container">
                                    <div class="bg-img-inner">
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img3" src="'.get_template_directory_uri().'/assets/img/bg-3.jfif" alt="">'?>
                                        </div>
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img4" src="'.get_template_directory_uri().'/assets/img/bg-4.jfif" alt="">'?>
                                        </div>
                                    </div>
                                    <div class="bg-img-inner">
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img1" src="'.get_template_directory_uri().'/assets/img/bg-1.jfif" alt="">'?>
                                        </div>
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img2" src="'.get_template_directory_uri().'/assets/img/bg-2.jfif" alt="">'?>
                                        </div>
                                    </div>
                                    <div class="bg-img-inner">
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img5" src="'.get_template_directory_uri().'/assets/img/bg-5.jfif" alt="">'?>
                                        </div>
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img6" src="'.get_template_directory_uri().'/assets/img/bg-6.jfif" alt="">'?>
                                        </div>
                                    </div>
                                    <div class="bg-img-inner">
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img7" src="'.get_template_directory_uri().'/assets/img/bg-7.jfif" alt="">'?>
                                        </div>
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img8" src="'.get_template_directory_uri().'/assets/img/bg-8.jfif" alt="">'?>
                                        </div>
                                    </div>
                                    <div class="bg-img-inner">
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img9" src="'.get_template_directory_uri().'/assets/img/bg-9.jfif" alt="">'?>
                                        </div>
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img10" src="'.get_template_directory_uri().'/assets/img/bg-10.jfif" alt="">'?>
                                        </div>
                                    </div>
                                    <div class="bg-img-inner">
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img11" src="'.get_template_directory_uri().'/assets/img/bg-11.jfif" alt="">'?>
                                        </div>
                                        <div class="bg-img-iteam">
                                            <?php echo '<img id="img12" src="'.get_template_directory_uri().'/assets/img/bg-12.jfif" alt="">'?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="v-pills-templates" role="tabpanel" aria-labelledby="v-pills-templates-tab"
                tabindex="0">
                <?php 
                    if(wp_is_mobile())
                    {    
                    ?>
                    <div class="mobail-tab">
                    <div class="mobaile-form-text-edit">
                        <div class="form-group flex-row mb-2">
                            <div class="select-wrapper flex-grow-1">
                                 <?php
                                    sanas_card_category_select("category-list");
                                    ?> 
                            </div>
                            <button class="cloes-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="tamplate">
                            <div class="tamplate-iteam active">
                                <img src="<?php echo get_template_directory_uri();?>/assets/template/b-t-1.jpg" alt="tamplate">
                            </div>
                            <div class="tamplate-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/template/b-t-2.png" alt="tamplate">
                            </div>
                            <div class="tamplate-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/template/b-t-3.png" alt="tamplate">
                            </div>
                            <div class="tamplate-iteam ">
                                <img src="<?php echo get_template_directory_uri();?>/assets/template/b-t-4.png" alt="tamplate">
                            </div>
                            <div class="tamplate-iteam ">
                                <img src="<?php echo get_template_directory_uri();?>/assets/template/b-t-5.png" alt="tamplate">
                            </div>
                            <div class="tamplate-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/template/b-t-6.png" alt="tamplate">
                            </div>
                            <div class="tamplate-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/template/b-t-7.png" alt="tamplate">
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                    }else{ ?>
                <div class="inner-container">
                    <div class="form-text-edit">
                        <form action="#">
                            <div class="search-btn">
                                <input type="search" placeholder="Search Templates">
                                <div class="search-icon">
                                    <i class="icon-Search"></i>
                                </div>
                            </div>
                        </form>
                        <div class="form-group mb-2">
                            <div class="select-wrapper">
                                 <?php
                                    sanas_card_category_select("category-list");
                                    ?> 
                            </div>
                        </div>
                        <div class="tamplate">
                            <div class="tamplate-inner">
                                <div class="tamplate-iteam">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/template/b-t-1.jpg" alt="">'?>
                                </div>
                                <div class="tamplate-iteam">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/template/b-t-2.png" alt="">'?>
                                </div>
                            </div>
                            <div class="tamplate-inner">
                                <div class="tamplate-iteam">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/template/b-t-3.png" alt="">'?>
                                </div>
                                <div class="tamplate-iteam">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/template/b-t-4.png" alt="">'?>
                                </div>
                            </div>
                            <div class="tamplate-inner">
                                <div class="tamplate-iteam">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/template/b-t-5.png" alt="">'?>
                                </div>
                                <div class="tamplate-iteam">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/template/b-t-6.png" alt="">'?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="v-pills-elements" role="tabpanel" aria-labelledby="v-pills-elements-tab"
                tabindex="0">
                <?php 
                    if(wp_is_mobile())
                    {    
                    ?>
                    <div class="mobail-tab">
                    <div class="mobaile-form-text-edit">
                        <div class="mobaile-template-piker">
                            <form action="#">
                                <div class="search-btn">
                                    <input type="search" placeholder="Search Elements">
                                    <div class="search-icon">
                                        <i class="icon-Search"></i>
                                    </div>
                                </div>
                            </form>
                            <button class="cloes-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="elements">
                            <div class="elements-iteam ">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-1.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-2.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-3.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-4.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-5.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-6.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-7.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-8.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-9.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-10.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-11.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-12.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-1.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-2.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-3.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-4.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-5.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-6.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-7.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-8.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-9.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-10.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-11.png" alt="stiker">
                            </div>
                            <div class="elements-iteam">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/e-12.png" alt="stiker">
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }else{ ?>
                <div class="inner-container">
                    <div class="form-text-edit">
                        <form action="#">
                            <div class="search-btn">
                                <input type="search" placeholder="Search Elements">
                                <div class="search-icon">
                                    <i class="icon-Search"></i>
                                </div>
                            </div>
                        </form>
                        <div class="elements">
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-1.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-2.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-3.png" alt="">'?>
                                </div>
                            </div>
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-4.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-5.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-6.png" alt="">'?>
                                </div>
                            </div>
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-7.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-8.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-9.png" alt="">'?>
                                </div>
                            </div>
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-10.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-11.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-12.png" alt="">'?>
                                </div>
                            </div>
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-1.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-2.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-3.png" alt="">'?>
                                </div>
                            </div>
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-4.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-5.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-6.png" alt="">'?>
                                </div>
                            </div>
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-7.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-8.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-9.png" alt="">'?>
                                </div>
                            </div>
                            <div class="elements-inner">
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-10.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-11.png" alt="">'?>
                                </div>
                                <div class="elements-iteam  sanas-item">
                                    <?php echo '<img src="'.get_template_directory_uri().'/assets/img/e-12.png" alt="">'?>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="cooming-soon">More Coming soon</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="v-pills-uploads" role="tabpanel" aria-labelledby="v-pills-uploads-tab"
                tabindex="0">
                <?php 
                    if(wp_is_mobile())
                    {    
                    ?>
                     <div class="mobail-tab">
                     <div class="mobaile-form-text-edit">
                    <div class="form-text-edit">
                            <div class="wl-upload-next ">
                            <?php 
                                $current_user = wp_get_current_user();
                                $user_id = $current_user->ID;
                                if(is_user_logged_in())
                                {
                                ?>                                
                                <div class="wl-img-audio">
                                    <div class="wl-uplod-img">
                                    <button id="uploadfrontImageBtn">
                                        <?php echo '<img src="' . get_template_directory_uri() . '/assets/img/ul-img.png" alt="">' ?>
                                         <div class="upload-image-text-size">
                                        <p>Upload image</p>
                                        <span>Maximum image size 5MB*</span>
                                    </div>
                                       <span class="icon-Upload-3"></span>
                                    </button>
                                    <input type="file" id="imageUpload" style="display: none;">
                                    <input type="hidden" id="event_user_id" name="event_user_id" value="<?php echo $user_id;?>">
                                    </div>
                                </div>
                                <?php } ?>                                
                                <div class="wl-img-audio" style="display:none;">
                                    <div class="wl-uplod-img">
                                        <a href="#">
                                            <img src="assets/img/ul-img.png" alt="upload-icon">
                                            <div class="upload-image-text-size">
                                                <p>Upload image</p>
                                                <span>Maximum image size 5MB*</span>
                                            </div>
                                            <span class="icon-Upload-3"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="wl-uploaded-item active">
                                    <span class="hedding">Your uploads</span>
                                </div>
                                <div class="wl-up-img-audio">
                                     <div class="background-images-piker">
                                        <div class="inner-container image-container" id="imagePreviewContainernew">
                                            <?php


                                                $current_user = wp_get_current_user();
                                                $user_id = $current_user->ID;
                                                // Example usage:


                                                $attachments = sanas_get_user_attachments($user_id);

                                                if (!empty($attachments)) {
                                                foreach ($attachments as $attachment) {
                                                ?>
                                                <div class="canvas-upload-image">
                                                    <img src="<?php echo $attachment['url']; ?>" />
                                                </div>
                                                <?php
                                                }                                                                                                   
                                                }
                                                ?>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <?php 
                    }else{ ?>
                <div class="inner-container">
                    <div class="form-text-edit">
                        <div class="wl-upload-next">
                            <div class="wl-img-audio">
                                <div class="wl-uplod-img">
                                    <button id="uploadbackImageBtn">
                                        <?php echo '<img src="' . get_template_directory_uri() . '/assets/img/ul-img.png" alt="">' ?>
                                        <div class="upload-image-text-size">
                                            <p>Upload image</p>
                                            <span>Maximum image size 20MB*</span>
                                        </div>
                                        <span class="icon-Upload-3"></span>
                                    </button>
                                    <input type="file" id="imageUpload" style="display: none;">
                                    <input type="hidden" id="event_user_id" name="event_user_id"
                                        value="<?php echo $user_id;?>">
                                </div>
                            </div>
                            <div class="wl-uploaded-item active">
                                <span class="hedding">Your uploads</span>
                            </div>
                            <div class="wl-up-img-audio">
                                <div class="background-images-piker">
                                    <div class="image-container" id="imagePreviewContainernew">
                                        <?php
                                        // Example usage:
                                        $user_attachments = sanas_get_user_attachments($user_id);
                                        $i=1;
                                        foreach ($user_attachments as $attachment) {

                                        ?>
                                        <div class="canvas-upload-image">
                                            <img src="<?php echo $attachment['url']; ?>" />
                                        </div>
                                        <?php
                                        $i++;
                                          
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="wl-right-slide-bar">
    <?php
    echo get_template_part('template-parts/dashboard/menu');
    ?>
</div>
<?php
    $currentURL = site_url();
    $dashpage = '/?dashboard=cover';
    $dashQuery = 'user-dashboard';
    $dashrsvp = '/?dashboard=rsvp';
    global $wp_rewrite;
    if ($wp_rewrite->permalink_structure == '') {
        $perma = "&";
    } else {
        $perma = "/";
    }
    $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // Parse the query string from the URL
    $query_string = parse_url($current_url, PHP_URL_QUERY);
    // Parse the query string into an associative array
    parse_str($query_string, $params);   
    // Get the values of the 'card_id' and 'event_id' parameters
    $card_id = isset($params['card_id']) ? intval($params['card_id']) : null;
    $event_id = isset($params['event_id']) ? intval($params['event_id']) : null;
    $card_post = get_post($card_id);
    $rsvpURL = esc_url($currentURL . $perma . $dashQuery . $dashrsvp .'&card_id=' . $card_id . '&event_id=' . $event_id);
    $coverURL = esc_url($currentURL . $perma . $dashQuery . $dashpage . '&card_id=' . $card_id . '&event_id=' . $event_id);

    global $wpdb;
    $sanas_card_event_table = $wpdb->prefix . 'sanas_card_event';
    $backpagequery = $wpdb->prepare(
        "SELECT event_back_card_json_edit 
         FROM $sanas_card_event_table 
         WHERE event_card_id = %d 
           AND event_no = %d",
        $card_id,
        $event_id
    );
    // Execute the query and get the result
    $backpagedata = $wpdb->get_var($backpagequery);
    $sanas_portfolio_meta = get_post_meta($card_id,'sanas_metabox',true);
    $backmetadata=$sanas_portfolio_meta['sanas_back_canavs_image'];
    if (!empty($backpagedata)) {
    // If $backpagedata is empty, show $data
    $data = $backpagedata;
    } else {
        // If $backpagedata is not empty, set it to null
        $data = $backmetadata;
    }
    $backimagequery = $wpdb->prepare(
              "SELECT event_front_bg_link FROM $sanas_card_event_table WHERE event_no = %d",
               $event_id
         );
    $backimage = $wpdb->get_var($backimagequery);

    $bg_colorquery = $wpdb->prepare(
              "SELECT event_front_bg_color FROM $sanas_card_event_table WHERE event_no = %d",
               $event_id
         );
    $event_front_bg_color = $wpdb->get_var($bg_colorquery);

    $default_image_url = get_template_directory_uri() . '/assets/img/BackGround_1.jpg';
    // Use the default image if the database image is empty
    if (empty($backimage)) {
        $backimage = $default_image_url;
    }

    $color_bg_link = $wpdb->prepare(
              "SELECT event_front_bg_color FROM $sanas_card_event_table WHERE event_no = %d",
               $event_id
         );
    $colorbg = $wpdb->get_var($color_bg_link);

    $event_step = $wpdb->prepare(
              "SELECT event_step_id FROM $sanas_card_event_table WHERE event_no = %d",
               $event_id
         );
    $event_step_id_final = $wpdb->get_var($event_step);

$colorbgvalue='';
if($colorbg)
{
    $colorbgvalue=$colorbg;
}

if($event_step_id_final==1)
{
    $event_step_final='2';
}
else{
    $event_step_final=$event_step_id_final;    
}
?>
<style type="text/css">
#canvasElement {
    background-image: url('<?php echo $backimage ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
<section class="wl-main-canvas">
    <div class="container-fluid h-100">
        <div class="inner-container h-100">
            <div class="inner-colum" id="canvasElement" style="background-color: <?php echo $colorbgvalue;?>">
                <div class="card-canvas">
                    <input type="hidden" name="colorbg" id="colorbg" value="<?php echo $colorbgvalue;?>">
                    <canvas id="canvas" width="420" height="605"></canvas>
                </div>
                <div class="wl-lower-btn">
                    <div class="sound-btn-">
                    </div>
                    <div class="nrxt-pre-btn">
                        <button class="btn btn-secondary" id="front-page-redirect"
                            step-id="<?php echo $event_step_final ;?>" card-id="<?php echo $card_id ;?>"
                            event-id="<?php echo $event_id;?>" btn-url="<?php echo $coverURL ?>"><i
                                class="fa-solid fa-arrow-left"></i> Back</button>
                        <button class="btn btn-secondary" id="save-back-canvas-db"
                            step-id="<?php echo $event_step_final ;?>" card-id="<?php echo $card_id ;?>"
                            event-id="<?php echo $event_id;?>" btn-url="<?php echo $rsvpURL ?>">Next<i
                                class="fa-solid fa-arrow-right"></i></button>

                    </div>
                    <?php wp_nonce_field('ajax-sanas-back-page-nonce', 'sanasbackpagesecurity');?>

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="header-options-msg" id="header-options-msg"
        value="You will lose your invitation progress.Please complete information of card step." />
    <?php 
            echo '<img id="deleteIcon" src="' . get_template_directory_uri() . '/assets/img/Delete.svg" alt="" style="display:none;">';
            echo '<img id="duplicateIcon" src="' . get_template_directory_uri() . '/assets/img/Copy.svg" alt="" style="display:none;">';
        ?>
</section>
<?php
      echo "<script>";
        echo "var canvasss = '" . $data . "';";
        echo "</script>";
?>
<?php
$imageSrc = '';
if (!empty($data)) {
    $jsonData = json_decode($data, true);
    if (isset($jsonData['backgroundImage']['src'])) {
        $imageSrc = esc_url($jsonData['backgroundImage']['src']);
    }
}
?>
<style>
#dynamic-image-back-container img {

    width: 50%;
    height: 100%;
    display: block;
    margin: auto;
    border: 3px solid transparent;
}
</style>
<?php $data = !empty($backmetadata) ? $backmetadata : $backmetadata;
?>
<?php
// Add this to your PHP code where you set up $data
$isInitialLoad = empty($frontpagedata) ? 'true' : 'false';
?>
<script type="text/javascript">
var phpbackCanvasData = <?php echo json_encode($data); ?>;
var isInitialLoad = "<?php echo $isInitialLoad; ?>";
</script>