<?php 
    require '../php/config/database.php';
    session_start();
	if (isset($_SESSION['vadminp']) | isset($_SESSION['vuserp'])) {
		if (isset($_SESSION['vuserp'])) {
			$stID = $_SESSION['Station_ID_No']; 
        } elseif (isset($_SESSION['vadminp'])) {
			$stID = $_POST['scstID'];
        }
    } else {
        header("Location: ../index.php");
    }

    $title = 'Appraisal Dashboard';
    $uriSgmnt = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $staffID = $uriSgmnt[4];
    $StationID = $uriSgmnt[5];
   
    require_once 'header.php';
    $db = new Database();

    $staff = $db->getRow('SELECT `Staff_ID`, `Station_ID`, C_Name 
    FROM `vsn_staff` WHERE `Staff_ID` = ? AND `Station_ID` = ?', [$staffID, $StationID]);
?>
    <div class="container bg-danger text-white">
        <nav class="nav justify-content-center bg-danger">
          <h2 class="text-light text-center">VISION MEDIA SERVICES</h2>
        </nav>
        <hr>
            <h3 class="text-center mt-3">Supervisor Appraisal</h3>
            <h4 class="text-center mt-3">SELF RATING OFFICIAL COMMENT SEAL 1 = LOWEST 5 = HIGTHEST</h4>
        
            <hr>
            
            <form action="/visionfm/appraisal/server.php" method="POST" class="form pb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <input type="text" disable
                            class="form-control disabled" name="S_Emp_Name" id="Emp_Name" value="<?= $staff['C_Name'] ?>"  required>
                        </div>

                        <div class="form-group">
                        <input type="text"
                            class="form-control" name="Emp_Department" id="Emp_Department" placeholder="Employee Department" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <input type="text"
                            class="form-control" name="App_Period" id="App_Period" placeholder="Appraisal Period" required>
                        </div>
                    </div>
                    <input type="hidden" name="Staff_ID" value="<?= $staff['Staff_ID']?>">
                    <input type="hidden" name="Station_ID" value="<?= $staff['Station_ID']?>">
                </div>
                <div class="form-group">

                <label for="Apr_Date">Self-Appraisal Date</label>
                <input type="date"
                    class="form-control" name="Apr_Date" id="Apr_Date" placeholder="Self-Appraisal Date" required>
                </div>
                <hr class="bg-danger">

                <h4><b>ADAPTABILITY</b></h4>
                <div class="form-row mb-2">
                    <div class="col-md-5 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Adjust to change in the work environment
                                </div>
                            </div>
                            <select required class="form-control" name="Emp_Adj_Change" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                Manages competing demands
                                </div>
                            </div>
                            <select required class="form-control" name="Emp_Comp_Dmnd" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">
                                Accept instruction
                                </div>
                            </div>
                            <select required class="form-control" name="Emp_Accpt_Inst" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group mx-1 my-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Official Comment</span>
                        </div>
                        <textarea required class="form-control" aria-label="With textarea" name="Adapt_Cmnt"></textarea>
                    </div>
                </div>

                <hr class="bg-danger">
                <h4><b>ATTENDANCE AND PUNCTUALITY</b></h4>
                <div class="form-row mb-2">
                    <div class="col-md-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">Punctuality</div>
                            </div>
                            <select required class="form-control form-control" name="Emp_Punctuality" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">Begins work on time</div>
                            </div>
                            <select required class="form-control form-control" name="Emp_Begin_Time" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">Finishes work on time</div>
                            </div>
                            <select required class="form-control form-control" name="Emp_Finish_Time" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">Dealing with deadline</div>
                            </div>
                            <select required class="form-control form-control" name="Emp_Deadline" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group mx-1 my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Official Comment</span>
                        </div>
                        <textarea required class="form-control" aria-label="With textarea" name="Attnd_Punc_Cmnt"></textarea>
                    </div>
                </div>

                <hr class="bg-danger">
                <h4><b>DEPENDABILITY</b></h4>
                <div class="form-row mb-2">
                    <div class="col-md-5 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">
                                    Response to management instruction
                                </div>
                            </div>
                            <select required class="form-control form-control" name="Emp_Resp_Inst" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">
                                Commitment to work
                                </div>
                            </div>
                            <select required class="form-control form-control" name="Emp_Commit" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text input-group-text-sm">
                                Ask for help when needed
                                </div>
                            </div>
                            <select required class="form-control form-control" name="Emp_Ask_Hlp" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group mx-1 my-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Official Comment</span>
                        </div>
                        <textarea required class="form-control" aria-label="With textarea" name="Depend_Cmnt"></textarea>
                    </div>
                </div>
                
                
                <input type="submit" class="btn btn-success btn-block" value="Save">
            </form>
        
    </div>
    <script src="../js/sb-admin-2.min.js"></script>
</body>
</html>