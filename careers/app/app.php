<?php
    include '/Users/mac/Documents/ATS/general/db_connect.php';
    $pid = $_POST['pid'];

    $file = $_FILES['resume'];
    $fileName= $_FILES['resume']['name'];
    $fileTmpName= $_FILES['resume']['tmp_name'];
    $fileSize = $_FILES['resume']['size'];
    $fileError = $_FILES['resume']['error'];
    $fileType = $_FILES['resume']['type'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));

    $allowed = array('pdf');

    if(in_array($fileActExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 500000){
                $fileNameNew = uniqid('', true).".".$fileActExt;
                $fileDestination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "File too big";
            }
        }else{
            echo "Error";
        }
    }else{
        echo "File Must Be PDF";
    }

    $sql = "SELECT * FROM position WHERE pid = '$pid' ";
    $result = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/careers/app/app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Athios</title>
    </head>

    <body> 
        <header>
            <div class="nav_container">
                    <div class="menu">
                        <img src="https://img1.wsimg.com/isteam/ip/c0c68920-e75d-4537-ba2e-968973ac6ffb/571f223e-3f59-44f4-b339-1fe51ac030d8.png" alt="logo" class="logo">
                        <nav style="float: left;">
                            <ul>
                                <li><a href="/careers/nav/home.php">Home</a></li>
                                <li><a href="/careers/nav/search.php">Application Status</a></li>
                            </ul>
                        </nav>
                    </div>
            </div>
        </header><br><br><br>
        <div class="container">
            <p class="title"><?php 
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                                echo $row['title'];
                            }
                        }
            ?></p>
        </div>   
        <form action="http://localhost:3000/careers/app/review.php" method="post" class="newpos" enctype="multipart/form-data" style="position: relative;left:20%; width:78%;">
                <div class="section" id="resume" data-label="Resume" style="height: 300px;">
                    <h2 style="padding: 110px 0;">Resume</h2>
                    <div class="right">
                        <p class='resume_file'>File: <a href="<?php echo $fileDestination?>"><?php echo $fileName?></a></p>
                    </div>
                </div><br><br><br><br><hr>
                <input type="hidden" name="dest" id="dest" value="<?php echo $fileDestination?>">
                <input type="hidden" name="resume" id="resume" value="<?php echo $fileName?>">
                <!--- Basic Info --->
                <div class="section" id="info" data-label="Basic Information" style="position:relative;margin-top: 80px;">
                    <h2 style="padding:110px 0;">Basic Information</h2>
                    <div class="right-info">
                        <fieldset>
                            <legend>Name</legend>
                            <input type="text" id="fname" name="fname" placeholder="First Name"><br><br>
                            <input type="text" id="mname" name="mname" placeholder="Middle Name"><br><br>
                            <input type="text" id="lname" name="lname" placeholder="Last Name"><br><br>
                        </fieldset><br><br>
                        <fieldset>
                            <label for="ptype">Phone type:</label>
                            <select name="ptype" id="ptype">
                                <option value = "select">Select...</option>
                                <option value = "mobile">mobile</option>
                                <option value = "home">home</option>
                            </select><br><br>
                            <input type="text" id="phone" name="phone" placeholder="Phone Number"><br><br>
                            <input type="text" id="email" name="email" placeholder="Email"><br><br>
                        </fieldset>
                    </div> 
                </div><br><br><br><br><hr>
                
                
                <!--- Experience --->
                <div class="section" id="experience" data-label="Experience" style="position:relative;margin-top: 80px;">
                    <h2 style="padding:110px 0;">Work Experience<br><span style="font-size:50%;margin-left: 10%;">(Most recent)</span></h2>
                    <div class="right-exp">
                    <fieldset>
                        <legend><h3>Experience</h3></legend>
                        <input type="text" id="company1" name="company1" placeholder="Company Name"><br><br>
                        <input type="text" id="title1" name="title1" placeholder="Title"><br><br>

                        <label for="sdate">Start Date</label><br>
                        <input type="date" id="sdate1" name="sdate1"><br><br>

                        <label for="edate">End Date</label><br>
                        <input type="date" id="edate1" name="edate1"><br><br>
                        <input type="text" id="desc1" name="desc1" placeholder="Description"><br><br>
                    </fieldset><br>
                    <input type ="hidden" id="expcount" name="expcount" value ="1">

                    <div id="new_work"></div>
                    <button id="add_work" type="button" class="btn">Add Work</button><br>
                    </div>
                </div><br><br><br><br><hr>

                <div class="section" id="education" data-label="Education" style="position:relative;margin-top: 80px;">
                    <h2 style="padding:110px 0;">Education</h2>
                    <div class="right-edu">
                    <fieldset>
                        <legend>Education</legend>
                        <input type="text" id="institution1" name="institution1" placeholder="Institution Name"><br><br>
                        <input type="text" id="degree1" name="degree1" placeholder="Degree"><br><br>
                        <input type="text" id="fos1" name="fos1" placeholder="Field of Study"><br><br>
                        <label for="syear">Start Year: </label>
                        <input type="text" id="syear1" name="syear1"><br><br>
                        <label for="eyear">Graduate Year (expected): </label>
                        <input type="text" id="eyear1" name="eyear1"><br><br>
                    </fieldset><br>
                    <input type ="hidden" id="educount" name="educount" value ="1">

                    <div id="new_edu"></div>
                    <button id="add_edu" type="button" class="btn">Add Education</button><br><br>
                    </div>
                </div><br><br><br><br><hr>                

                <div class="section" id="socials" data-label="Socials" style="position:relative;margin-top: 80px; height: 300px;">
                    <h2 style="padding:110px 0;">Socials</h2>
                    <div class="right-social">
                    <fieldset>
                        <legend>Socials</legend>
                        <input type="url" id="in" name="in" placeholder="LinkedIn"><br><br>
                        <input type="url" id="website1" name="website1" placeholder="Website"><br><br>
                        <input type ="hidden" id="scount" name="scount" value ="1">
                        <div id="new_site"></div>
                        <button id="add_site" type="button" class="btn">Add Website</button><br><br>
                    </fieldset>
                    </div>
                </div><br><br><br><br><br><hr>
                <div class="section" id="Voluntary Disclosure" data-label="Voluntary Disclosure" style="position:relative;margin-top: 80px;">
                    <h2 style="padding:400px 0;">Voluntary Disclosure</h2>
                    <div class="right-vd">
                        <fieldset>
                            <legend>Are you legally authorized to work in the United States?</legend><br>
                            <select name='authorized' id='authorized'>
                                    <option value = "select">Select...</option>
                                    <option value = "yes">Yes</option>
                                    <option value = "no">No</option>
                            </select><br><br>
                            <legend>Will you now or in the future require sponsorship for employement visa status</legend><br>
                            <select name='sponsorship' id='sponsorship'>
                                    <option value = "select">Select...</option>
                                    <option value = "yes">Yes</option>
                                    <option value = "no">No</option>
                            </select><br><br> 
                        </fieldset>
                        <fieldset>
                            <h3>Equal Employemnt Opportunity</h3>
                            <p>For government reporting purposes, we ask candidates to respond to the below self-identification survey. Completion of the form is entirely voluntary. Whatever your decision, it will not be considered in the hiring process or thereafter. Any information that you do provide will be recorded and maintained in a confidential file.</p>
                            <p>As set forth in Athios’ Equal Employment Opportunity policy, we do not discriminate on the basis of any protected group status under any applicable law.</p><br>
                            <p class="line">Gender: </p>
                            <select name='gender' id='gender' class="option">
                                    <option value = "select">Select...</option>
                                    <option value = "male">Male</option>
                                    <option value = "female">Female</option>
                                    <option value = "nonbinary">Non-Binary</option>
                                    <option value = "intersex">Intersex</option>
                                    <option value = "gendernonconform">Gender Non-Conforming</option>
                                    <option value = "transgender">Transgender</option>
                                    <option value = "nda">Prefer Not to Disclose</option>
                            </select><br><br><br>
                            <p class="line">Race: </p>
                            <select name='race' id='race' class="option">
                                    <option value = "select">Select...</option>
                                    <option value = "American Indian or Alaskan Native">American Indian or Alaskan Native</option>
                                    <option value = "Asian">Asian</option>
                                    <option value = "Black or African American">Black or African American</option>
                                    <option value = "Hispanic or Latino">Hispanic or Latino </option>
                                    <option value = "Native Hawaiian or Other Pacific Islander">Native Hawaiian or Other Pacific Islander</option>
                                    <option value = "White">White (not Hispanic or Latino)</option>
                                    <option value = "nda">Prefer Not to Disclose</option>
                            </select>
                        </fieldset>
                    </div><br>
                    <fieldset>
                        <h3>Veteran Status</h3>
                        <div class="right-survey">
                            <p>If you believe you belong to any of the categories of protected veterans listed below, please indicate by making the appropriate selection.</p>
                            <p>A "disabled veteran" is one of the following: a veteran of the U.S. military, ground, naval or air service who is entitled to compensation (or who but for the receipt of military retired pay would be entitled to compensation) under laws administered by the Secretary of Veterans Affairs; or a person who was discharged or released from active duty because of a service-connected disability.</p>
                            <p>A "recently separated veteran" means any veteran during the three-year period beginning on the date of such veteran's discharge or release from active duty in the U.S. military, ground, naval, or air service.</p>
                            <p>An "active duty wartime or campaign badge veteran" means a veteran who served on active duty in the U.S. military, ground, naval or air service during a war, or in a campaign or expedition for which a campaign badge has been authorized under the laws administered by the Department of Defense.</p>
                            <p>An "Armed forces service medal veteran" means a veteran who, while serving on active duty in the U.S. military, ground, naval or air service, participated in a United States military operation for which an Armed Forces service medal was awarded pursuant to Executive Order 12985.</p>
                            <p class="line">Veteran Status: </p>
                            <select name='veteran' id='veteran' class="option">
                                    <option value = "select">Select...</option>
                                    <option value = "yes">Yes, I am a veteran or active member</option>
                                    <option value = "no">No, I am not a veteran or active member</option>
                                    <option value = "nda">I do not wish to answer</option>
                            </select>                    
                        </div>
                    </fieldset>
                </div><br><br><br><br><hr>
                <div class="section" id="Self-Identification" data-label="Self-Identification" style="position:relative;margin-top: 80px;">
                    <h2 style="padding:110px 0;">Voluntary Self-Identification of Disability</h2>
                    <fieldset>
                        <h3>Form CC-305</h3>
                        <div class="right-survey">
                            <h4>Why are you being asked to complete this form?</h4>
                            <p>We are a federal contractor or subcontractor. The law requires us to provide equal employment opportunity to qualified people with disabilities. We have a goal of having at least 7% of our workers as people with disabilities. The law says we must measure our progress towards this goal. To do this, we must ask applicants and employees if they have a disability or have ever had one. People can become disabled, so we need to ask this question at least every five years.</p>
                            <p>Completing this form is voluntary, and we hope that you will choose to do so. Your answer is confidential. No one who makes hiring decisions will see it. Your decision to complete the form and your answer will not harm you in any way. If you want to learn more about the law or this form, visit the U.S. Department of Labor’s Office of Federal Contract Compliance Programs (OFCCP) website at www.dol.gov/ofccp.</p>
                            <h4>How do you know if you have a disability?</h4>
                            <p>A disability is a condition that substantially limits one or more of your “major life activities.” If you have or have ever had such a condition, you are a person with a disability. Disabilities include, but are not limited to:</p>
                            <p class="dlist">Alcohol or other substance use disorder (not currently using drugs illegally)</p>
                            <p class="dlist">Autoimmune disorder, for example, lupus, fibromyalgia, rheumatoid arthritis, HIV/AIDS</p>
                            <p class="dlist">Blind or low vision</p>
                            <p class="dlist">Cancer (past or present)</p>
                            <p class="dlist">Cardiovascular or heart disease</p>
                            <p class="dlist">Celiac disease</p>
                            <p class="dlist">Cerebral palsy</p>
                            <p class="dlist">Deaf or serious difficulty hearing</p>
                            <p class="dlist">Diabetes</p>
                            <p class="dlist">Disfigurement, for example, disfigurement caused by burns, wounds, accidents, or congenital disorders</p>
                            <p class="dlist">Epilepsy or other seizure disorder</p>
                            <p class="dlist">Gastrointestinal disorders, for example, Crohn's Disease, irritable bowel syndrome</p>
                            <p class="dlist">Intellectual or developmental disability</p>
                            <p class="dlist">Mental health conditions, for example, depression, bipolar disorder, anxiety disorder, schizophrenia, PTSD</p>
                            <p class="dlist">Missing limbs or partially missing limbs</p>
                            <p class="dlist">Mobility impairment, benefiting from the use of a wheelchair, scooter, walker, leg brace(s) and/or other supports</p>
                            <p class="dlist">Nervous system condition, for example, migraine headaches, Parkinson’s disease, multiple sclerosis (MS)</p>
                            <p class="dlist">Neurodivergence, for example, attention-deficit/hyperactivity disorder (ADHD), autism spectrum disorder, dyslexia, dyspraxia, other learning disabilities</p>
                            <p class="dlist">Partial or complete paralysis (any cause)</p>
                            <p class="dlist">Pulmonary or respiratory conditions, for example, tuberculosis, asthma, emphysema</p>
                            <p class="dlist">Short stature (dwarfism)</p>
                            <p class="dlist">Traumatic brain injury</p>
                            <p class="line">Disability Status: </p>
                            <select name='veteran' id='veteran' class="option">
                                    <option value = "select">Select...</option>
                                    <option value = "yes">Yes, I have a disability or have had one in the past</option>
                                    <option value = "no">No, I do not have a disability or have had one in the past</option>
                                    <option value = "nda">I do not wish to answer</option>
                            </select>
                        </div>
                    </fieldset>
                </div><br><br><br><br><br><br><br>

                <input type='hidden' id='pid' name='pid' value='<?php echo $pid ?>'>
                <input type = "submit" value="Review" class="submit"><br><br><br><br>
            </form>
        </div>                     
        <script>
            let expcount =1;
            let educount =1;
            let scount = 1;
            
            // Dynamically make new Work Entry
            $("#add_work").click(function() {
                expcount++;
                newRowAdd= '<div id ="exp">' + 
                            '<h2 style="padding:110px 0;"></h2>' +
                            '<div class="right-edu">' + 
                            '<fieldset>'+
                            '<legend>Experience</legend>' +
                            '<label for="company">Company Name: </label>'+
                            '<input type="text" id="company'+expcount+'" name="company'+expcount+'"><br><br>'+
                            '<label for="title">Position Title: </label>' +
                            '<input type="text" id="title'+expcount+'" name="title'+expcount+'"><br><br>' +
                            '<label for="sdate">Start Date</label><br>' +
                            '<input type="date" id="sdate'+expcount+'" name="sdate'+expcount+'"><br><br>' +
                            '<label for="edate">End Date</label><br>' +
                            '<input type="date" id="edate'+expcount+'" name="edate'+expcount+'"><br><br>' +
                            '<label for="desc">Position Description</label>' +
                            '<input type="text" id="desc'+expcount+'" name="desc'+expcount+'"><br><br>' +
                            '<input type = "hidden" id="expcount" name="expcount" value="'+ expcount +'">'+
                            '<button id="remove_work" type="button">Remove</button></div>' +
                            '</fieldset></div><br>';

                $('#new_work').append(newRowAdd);
            });
            $("body").on("click", "#remove_work", function(){
                $(this).parents("#exp").remove();
            })

            // Dynamically make new Education Entry
            $("#add_edu").click(function() {
                educount++;
                newRowAdd= '<div id ="edu">' +
                            '<h2 style="padding:110px 0;"></h2>' +
                            '<div class="right-edu">' +
                            '<fieldset>' + 
                            '<legend>Education</legend>' +
                            '<label for="institution">Institution Name: </label>' +
                            '<input type="text" id="institution'+educount+'" name="institution'+educount+'"><br><br>' +
                            '<label for="degree">Degree: </label>'+
                            '<input type="text" id="degree'+educount+'" name="degree'+educount+'"><br><br>'+
                            '<label for="fos">Field of Study: </label>'+
                            '<input type="text" id="fos'+educount+'" name="fos'+educount+'"><br><br>'+  
                            '<label for="syear">Start Year: </label>' +
                            '<input type="text" id="syear'+educount+'" name="syear'+educount+'"><br><br>' +
                            '<label for="eyear">Graduate Year (expected): </label>'+
                            '<input type="text" id="eyear'+educount+'" name="eyear'+educount+'"><br><br>'+
                            '<input type = "hidden" id="educount" name="educount" value="'+educount+'">'+
                            '<button id="remove_edu" type="button">Remove</button></div>' +
                            '</fieldset></div><br>';

                $("#new_edu").append(newRowAdd);
            });
            $("body").on("click", "#remove_edu", function(){
                $(this).parents("#edu").remove();
            })

            $("#add_site").click(function() {
                scount++;
                newRowAdd= '<div id ="site">' +
                            '<label for="website">Website :</label>' +
                            '<input type="url" id="website'+scount+'" name="website'+scount+'">' +
                            '<input type = "hidden" id="scount" name="scount" value="'+ scount +'">'+
                            '<button id="remove_site" type="button">Remove</button><br><br></div>' +
                            '</fieldset>';

                $('#new_site').append(newRowAdd);
            });
            $("body").on("click", "#remove_site", function(){
                $(this).parents("#site").remove();
            })

            function activateNav(){
                const sections = document.querySelectorAll(".section");
                const navContainer = document.createElement("nav");
                const navItems = Array.from(sections).map(section => {
                    return `
                        <div class="nav-item" data-for-section="${section.id}">
                            <a href="#${section.id}" class="nav-link"></a>
                            <span class="nav-label">${section.dataset.label}</span>
                        </div>
                    `;
                });
            
                navContainer.classList.add("nav");
                navContainer.innerHTML = navItems.join("");

                const observer = new IntersectionObserver(entries => {
                    document.querySelectorAll(".nav-link").forEach(navLink => {
                        navLink.classList.remove("nav-link-selected");
                    });

                    document.querySelectorAll(".nav-label").forEach(navLabel=> {
                        navLabel.classList.remove("nav-label-selected");
                    });

                    const visibleSection = entries.filter(entry => entry.isIntersecting)[0];

                    document.querySelector(`.nav-item[data-for-section="${visibleSection.target.id}"] .nav-link`).classList.add("nav-link-selected");
                    document.querySelector(`.nav-item[data-for-section="${visibleSection.target.id}"] .nav-label`).classList.add("nav-label-selected");
                    
                }, {threshold: .7});

                sections.forEach(section => observer.observe(section));
            
                document.body.appendChild(navContainer);
            }
            activateNav();

            // When the user scrolls the page, execute myFunction

        </script>
    </body><br><br>
    <div class="block" style="top: 200px;">
        <footer>
            <p>Designed and Developed By: Mark Anthony Castillo</p>
            <p>Applicant Tracking System (Version: Beta)</p>
        </footer>
    </div>
</html>