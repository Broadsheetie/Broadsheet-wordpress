						<form method="get" action="index.php">					
							<div class="clear">
								<h3>Basic Details</h3>
								<div class="basic_calc-row">
									<div class="row<?php echo ($errors['salary']) ? ' error_row' : ''?>">
										<div class="label">Your Gross pay:</div>
										<div class="input">
											&euro;<input type="text" name="salary" id="salary" value="<?php echo $_GET['salary']; ?>" />
										</div>
										<?php if ($errors['salary']) :?>
										<div class="error">
											<?php echo $errors['salary'];?>
										</div>
										<?php endif;?>	
									</div>
									<div class='row'>
								    	<div class="label">You are:</div> 
										<div class="input">
											<select name="employment_status" id="employment_status">
												<option value="1" <?php echo (isset($_GET['employment_status']) && $_GET['employment_status'] == 1) ? 'selected="selected"' : '';?>>a PAYE worker</option>
												<option value="2" <?php echo (isset($_GET['employment_status']) && $_GET['employment_status'] == 2) ? 'selected="selected"' : '';?>>a Public Servant</option>
												<option value="3" <?php echo ((isset($_GET['self_employed']) && $_GET['self_employed'] == 1) || (isset($_GET['employment_status']) && $_GET['employment_status'] == 3)) ? 'selected="selected"' : '';?>>Self Employed</option>
											</select>
										</div>
								    </div>
									<div class="row<?php echo ($errors['marital_status']) ? ' error_row' : ''?>">
										<div class="label">Marital Status:</div>
										<div class="input">
											<select name="marital_status" id="marital_status">
												<option value="1" <?php echo (isset($_GET['marital_status']) && $_GET['marital_status'] == 1) ? 'selected="selected"' : '';?>>Single</option>
												<option value="2" <?php echo (isset($_GET['marital_status']) && $_GET['marital_status'] == 2) ? 'selected="selected"' : '';?>>Married (1 income)</option>
												<option value="3" <?php echo (isset($_GET['marital_status']) && $_GET['marital_status'] == 3) ? 'selected="selected"' : '';?>>Married (2 incomes, joint assessment)</option>
												<option value="5" <?php echo (isset($_GET['marital_status']) && $_GET['marital_status'] == 5) ? 'selected="selected"' : '';?>>Married (2 incomes, assessed as a single)</option>
												<option value="6" <?php echo (isset($_GET['marital_status']) && $_GET['marital_status'] == 6) ? 'selected="selected"' : '';?>>Married (2 incomes, seperate assessment)</option>
												<option value="4" <?php echo (isset($_GET['marital_status']) && $_GET['marital_status'] == 4) ? 'selected="selected"' : '';?>>Widowed</option>
											</select>
										</div>
										<?php if ($errors['marital_status']) :?>
										<div class="error">
											<?php echo $errors['marital_status'];?>
										</div>
										<?php endif;?>	
									</div>
									<div class="spouse_income_row <?php echo ($_GET['marital_status'] != 3) ? ' hidden' : ''?> row<?php echo ($errors['spouse_income']) ? ' error_row' : ''?>">
										<div class="label">Spouse's gross pay:</div>
										<div class="input">
											&euro;<input type="text" name="spouse_income" id="spouse_income" value="<?php echo $_GET['spouse_income']; ?>" />
										</div>
										<?php if ($errors['spouse_income']) :?>
										<div class="error">
											<?php echo $errors['spouse_income'];?>
										</div>
										<?php endif;?>	
									</div>
									<div class="spouse_income_row <?php echo ($_GET['marital_status'] != 3) ? ' hidden' : ''?> row">
										<div class="label">Your spouse is</div>
										<div class="input">
											<select name="spouse_employment_status" id="spouse_employment_status">
												<option value="1" <?php echo (isset($_GET['spouse_employment_status']) && $_GET['spouse_employment_status'] == 1) ? 'selected="selected"' : '';?>>a PAYE worker</option>
												<option value="2" <?php echo (isset($_GET['spouse_employment_status']) && $_GET['spouse_employment_status'] == 2) ? 'selected="selected"' : '';?>>a Public Servant</option>
												<option value="3" <?php echo (isset($_GET['spouse_employment_status']) && $_GET['spouse_employment_status'] == 3) ? 'selected="selected"' : '';?>>Self Employed</option>
											</select>
										</div>
									</div>
									<div class="row<?php echo ($errors['children']) ? ' error_row' : ''?>">
										<div class="label">Children:</div>
										<div class="input"> 
											<select name="children" id="children">
												<option value="0" <?php echo (isset($_GET['children']) && $_GET['children'] == 0) ? 'selected="selected"' : '';?>>None</option>
												<option value="1" <?php echo (isset($_GET['children']) && $_GET['children'] == 1) ? 'selected="selected"' : '';?>>1</option>
												<option value="2" <?php echo (isset($_GET['children']) && $_GET['children'] == 2) ? 'selected="selected"' : '';?>>2</option>
												<option value="3" <?php echo (isset($_GET['children']) && $_GET['children'] == 3) ? 'selected="selected"' : '';?>>3</option>
												<option value="4" <?php echo (isset($_GET['children']) && $_GET['children'] == 4) ? 'selected="selected"' : '';?>>4</option>
												<option value="5" <?php echo (isset($_GET['children']) && $_GET['children'] == 5) ? 'selected="selected"' : '';?>>5</option>
												<option value="6" <?php echo (isset($_GET['children']) && $_GET['children'] == 6) ? 'selected="selected"' : '';?>>6</option>
												<option value="7" <?php echo (isset($_GET['children']) && $_GET['children'] == 7) ? 'selected="selected"' : '';?>>7</option>
												<option value="8" <?php echo (isset($_GET['children']) && $_GET['children'] == 8) ? 'selected="selected"' : '';?>>8</option>
											</select>
										</div>
										<?php if ($errors['children']) :?>
										<div class="error">
											<?php echo $errors['children'];?>
										</div>
										<?php endif;?>
									</div>
									<div id="primary_carer_row" class="<?php echo (isset($_GET['primary_carer']) && $_GET['primary_carer']) ? '' : 'hidden'?> row">
										<div class="label">Are you the primary carer?</div>
										<div class="input"> 
												<select name="primary_carer" id="primary_carer">
												  <option value="0" <?php echo (isset($_GET['primary_carer']) && $_GET['primary_carer'] == 0) ? 'selected="selected"' : '';?>>No</option>
												  <option value="1" <?php echo (isset($_GET['primary_carer']) && $_GET['primary_carer'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
												</select>
										</div>
									</div>
									<div class="row<?php echo ($errors['age']) ? ' error_row' : ''?>">
										<div class="label">Age:</div>
										<div class="input"> 
											<select name="age" id="age">
										      <option value="29" <?php echo (isset($_GET['age']) && $_GET['age'] == 29) ? 'selected="selected"' : '';?>>18-29</option>
										      <option value="39" <?php echo (isset($_GET['age']) && $_GET['age'] == 39) ? 'selected="selected"' : '';?>>30-39</option>
										      <option value="49" <?php echo (isset($_GET['age']) && $_GET['age'] == 49) ? 'selected="selected"' : '';?>>40-49</option>
										      <option value="54" <?php echo (isset($_GET['age']) && $_GET['age'] == 54) ? 'selected="selected"' : '';?>>50-54</option>
										      <option value="59" <?php echo (isset($_GET['age']) && $_GET['age'] == 59) ? 'selected="selected"' : '';?>>55-59</option>
                                              <option value="60" <?php echo (isset($_GET['age']) && $_GET['age'] == 60) ? 'selected="selected"' : '';?>>60-64</option>
                                                <option value="65" <?php echo (isset($_GET['age']) && $_GET['age'] == 65) ? 'selected="selected"' : '';?>>65-69</option>
										      <option value="70" <?php echo (isset($_GET['age']) && $_GET['age'] == 70) ? 'selected="selected"' : '';?>>70+</option>
										    </select>
										</div>
									    <?php if ($errors['age']) :?>
										<div class="error">
											<?php echo $errors['age'];?>
										</div>
										<?php endif;?>
									</div>
									<div id="age_credit_row" class="row<?php echo ($errors['age_credit']) ? ' error_row' : ''; if ($_GET['age'] != 60) echo ' hidden'?>">
									    <div class="label">Will you be 65 or older this year?</div> 
										<div class="input">
											<select name="age_credit" id="age_credit">
										      <option value="0" <?php echo (isset($_GET['age_credit']) && $_GET['age_credit'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['age_credit']) && $_GET['age_credit'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
									    <?php if ($errors['age_credit']) :?>
										<div class="error">
											<?php echo $errors['age_credit'];?>
										</div>
										<?php endif;?>
								    </div>
								    <div class='row'>
								    	<div class="label">Do you have a 'full' medical card?</div> 
										<div class="input">
											<select name="medical_card" id="medical_card">
										      <option value="0" <?php echo (isset($_GET['medical_card']) && $_GET['medical_card'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['medical_card']) && $_GET['medical_card'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row">
										<div class="label">What is your house worth:</div>
										<div class="input">
											&euro;<input type="text" name="house_value" id="house_value" value="<?php if (isset($_GET['house_value'])) echo $_GET['house_value']; ?>" />
										</div>
										<?php if ($errors['house']) :?>
										<div class="error">
											<?php echo $errors['house'];?>
										</div>
										<?php endif;?>	
									</div>
									<div id="local_authority_row" class="row <?php echo (!isset($_GET['house_value'])) ? 'hidden': ''; ?>">
										<div class="label">What local authority do you live in:</div>
										<div class="input">
											<select name="local_authority" id="local_authority">
												<option value="0" <?php echo ((isset($_GET['local_authority']) && $_GET['local_authority'] == 0) || (!isset($_GET['local_authority'])))? 'selected="selected"' : '';?>>Select local authority</option>
												<option value="1" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 1) ? 'selected="selected"' : '';?>>Carlow County Council</option>
												<option value="2" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 2) ? 'selected="selected"' : '';?>>Cavan County Council</option>
												<option value="3" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 3) ? 'selected="selected"' : '';?>>Clare County Council</option>
												<option value="4" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 4) ? 'selected="selected"' : '';?>>Cork City Council</option>
												<option value="5" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 5) ? 'selected="selected"' : '';?>>Cork County Council</option>
												<option value="6" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 6) ? 'selected="selected"' : '';?>>Donegal County Council</option>
												<option value="7" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 7) ? 'selected="selected"' : '';?>>Dublin City Council</option>
												<option value="8" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 8) ? 'selected="selected"' : '';?>>D/L Rathdown County Council</option>
												<option value="9" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 9) ? 'selected="selected"' : '';?>>Fingal County Council</option>
												<option value="10" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 10) ? 'selected="selected"' : '';?>>Galway City Council</option>
												<option value="11" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 11) ? 'selected="selected"' : '';?>>Galway County Council</option>
												<option value="12" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 12) ? 'selected="selected"' : '';?>>Kerry County Council</option>
												<option value="13" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 13) ? 'selected="selected"' : '';?>>Kildare County Council</option>
												<option value="14" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 14) ? 'selected="selected"' : '';?>>Kilkenny County Council</option>
												<option value="15" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 15) ? 'selected="selected"' : '';?>>Laois County Council</option>
												<option value="16" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 16) ? 'selected="selected"' : '';?>>Leitrim County Council</option>
												<option value="17" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 17) ? 'selected="selected"' : '';?>>Limerick City and County Council</option>
												<option value="18" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 18) ? 'selected="selected"' : '';?>>Longford County Council</option>
												<option value="19" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 19) ? 'selected="selected"' : '';?>>Louth County Council</option>
												<option value="20" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 20) ? 'selected="selected"' : '';?>>Mayo County Council</option>
												<option value="21" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 21) ? 'selected="selected"' : '';?>>Meath County Council</option>
												<option value="22" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 22) ? 'selected="selected"' : '';?>>Monaghan County Council</option>
												<option value="23" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 23) ? 'selected="selected"' : '';?>>Offaly County Council	Leinster</option>
												<option value="24" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 24) ? 'selected="selected"' : '';?>>Roscommon County Council</option>
												<option value="25" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 25) ? 'selected="selected"' : '';?>>Sligo County Council</option>
												<option value="26" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 26) ? 'selected="selected"' : '';?>>South Dublin County Council</option>
												<option value="27" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 27) ? 'selected="selected"' : '';?>>Tipperary County Council</option>
												<option value="28" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 28) ? 'selected="selected"' : '';?>>Waterford City and County Council</option>
												<option value="29" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 29) ? 'selected="selected"' : '';?>>Westmeath County Council</option>
												<option value="30" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 30) ? 'selected="selected"' : '';?>>Wexford County Council</option>
												<option value="31" <?php echo (isset($_GET['local_authority']) && $_GET['local_authority'] == 31) ? 'selected="selected"' : '';?>>Wicklow County Council</option>
										    </select>
										</div>
									</div>
									<?php if ($year2 >= 2016) : ?>
									<div class="row">
										<div class="label">How much did you pay in water charges in <?php echo $year1; ?>?</div>
										<div class="input">
											&euro;<input type="text" name="water_charges" id="water_charges" value="<?php if (isset($_GET['water_charges'])) echo $_GET['water_charges']; ?>" />
										</div>
									</div>
									<?php endif; ?>
								</div>
								<div class="calculator-options" style="clear:both">
									<div id="basic_calc" class="switch_calculator">Basic Calculator</div> | <div id="advanced_calc" class="switch_calculator">Advanced Calculator</div>
								</div>
								<div class="advanced_calc_row <?php if (!isset($_GET['show_advanced']) || !$_GET['show_advanced']) echo 'hidden'; ?>">
									
									<h3>Pension</h3>
									<div class="row<?php echo ($errors['pension']) ? ' error_row' : ''?>">	
										<div class="label">Pension Contribution:</div>
										<div class="input">
											<input type="text" name="pension" id="pension" value="<?php echo $_GET['pension']; ?>" size="10" />
											<select name="pension_type">
												<option value='Percentage'>% of my gross</option>
												<option value='Euro' <?php echo ($_GET['pension_type'] == 'Euro') ? ' selected="selected"' : '' ?>>Euros</option>
											</select>
										</div>
										<?php if ($errors['pension']) :?>
										<div class="error">
											<?php echo $errors['pension'];?>
										</div>
										<?php endif;?>
									</div>
									<div class="row<?php echo ($errors['avc']) ? ' error_row' : ''?>">
										<div class="label">AVC:</div>
										<div class="input">
											<input type="text" name="avc" id="avc" value="<?php echo $_GET['avc']; ?>" size="10" />
											<select name="avc_type">
												<option value='Percentage'>% of my gross</option>
												<option value='Euro'<?php echo ($_GET['avc_type'] == 'Euro') ? ' selected="selected"' : '' ?>>Euros</option>
											</select>
										</div>
										<?php if ($errors['avc']) :?>
										<div class="error">
											<?php echo $errors['avc'];?>
										</div>
										<?php endif;?>
									</div>
									<h3 class="clear">Benefit in Kind</h3>
									<div class="row<?php echo ($errors['company_car']) ? ' error_row' : ''?>">
										<div class="label">Do you have a company car:</div>
										<div class="input">
											<select name="company_car" id="company_car" onchange="javascript:jQuery('#car_details').toggle();">
										      <option value="0" <?php echo (isset($_GET['company_car']) && $_GET['company_car'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['company_car']) && $_GET['company_car'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
									    </div>
									    <?php if ($errors['company_car']) :?>
										<div class="error">
											<?php echo $errors['company_car'];?>
										</div>
										<?php endif;?>
								    </div>
								    <div id="car_details" <?php echo (!$_GET['company_car']) ? 'class="hidden"' : '';?>>
									    <div class="row<?php echo ($errors['original_market_value']) ? ' error_row' : ''?>">
									    	<div class="label">Original market value of car:</div> 
									    	<div class="input">
									    		&euro;<input type="text" id="original_market_value" name="original_market_value" value="<?php echo $_GET['original_market_value']; ?>" />
									    	</div>
									    	<?php if ($errors['original_market_value']) :?>
											<div class="error">
												<?php echo $errors['original_market_value'];?>
											</div>
											<?php endif;?>
										</div>
										<div class="row<?php echo ($errors['business_mileage']) ? ' error_row' : ''?>">
											<div class="label">What's your business mileage (in kilometres):</div> 
											<div class="input">
												<select name="business_mileage" id="business_mileage">
											      <option value="24135" <?php echo (isset($_GET['business_mileage']) && $_GET['business_mileage'] == 24135) ? 'selected="selected"' : '';?>>24,135 or less</option>
											      <option value="32180" <?php echo (isset($_GET['business_mileage']) && $_GET['business_mileage'] == 32180) ? 'selected="selected"' : '';?>>24,136 to 32,180</option>
											      <option value="40225" <?php echo (isset($_GET['business_mileage']) && $_GET['business_mileage'] == 40225) ? 'selected="selected"' : '';?>>32,181 to 40,225</option>
											      <option value="48270" <?php echo (isset($_GET['business_mileage']) && $_GET['business_mileage'] == 48270) ? 'selected="selected"' : '';?>>40,226 to 48,270</option>
											      <option value="48271" <?php echo (isset($_GET['business_mileage']) && $_GET['business_mileage'] == 48271) ? 'selected="selected"' : '';?>>48,271+</option>
											    </select> km
										    </div>
									    	<?php if ($errors['business_mileage']) :?>
											<div class="error">
												<?php echo $errors['business_mileage'];?>
											</div>
											<?php endif;?>
										</div>
									    <div class="row<?php echo ($errors['running_cost']) ? ' error_row' : ''?>">
											<div class="label">Do you contribute to the running costs?</div>
											<div class="input">
												&euro;<input type="text" id="running_cost" name="running_cost" value="<?php echo $_GET['running_cost']; ?>" /> (per year)
											</div>
											<?php if ($errors['running_cost']) :?>
											<div class="error">
												<?php echo $errors['running_cost'];?>
											</div>
											<?php endif;?>
										</div>
									</div>
								    <div class="row<?php echo ($errors['employer-health-insurance']) ? ' error_row' : ''?>">
								    	<div class="label">Does your employer pay your heath insurance?</div> 
										<div class="input">
											<select name="employer-health-insurance" id="employer-health-insurance" onchange="javascript:jQuery('#heath_insurance_contribution-row').toggle();">
										      <option value="0" <?php echo (isset($_GET['employer-health-insurance']) && $_GET['employer-health-insurance'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['employer-health-insurance']) && $_GET['employer-health-insurance'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
									    </div>
									    <?php if ($errors['employer-health-insurance']) :?>
										<div class="error">
											<?php echo $errors['employer-health-insurance'];?>
										</div>
										<?php endif;?>
									</div>
									<div id="heath_insurance_contribution-row" class="row<?php echo ($errors['heath_insurance_contribution']) ? ' error_row' : ''; echo (!$_GET['employer-health-insurance']) ? ' hidden' : '';?>">
								    	<div class="label">How much?</div> 
								    	<div class="input">
								    		&euro;<input type="text" id="heath_insurance_contribution" name="heath_insurance_contribution" value="<?php echo $_GET['heath_insurance_contribution']; ?>" />
								    	</div>
								    	<?php if ($errors['heath_insurance_contribution']) :?>
										<div class="error">
											<?php echo $errors['heath_insurance_contribution'];?>
										</div>
										<?php endif;?>
									</div>
									<h3 class="clear">Tax Reliefs</h3>
								    <div class="row<?php echo ($errors['rent']) ? ' error_row' : ''?>">
								    	<div class="label">Have you been renting since before 7th of December 2010?</div>
								    	<div class="input">
										    <select name="rent" id="rent">
										      <option value="0" <?php echo (isset($_GET['rent']) && $_GET['rent'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['rent']) && $_GET['rent'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
									    <?php if ($errors['rent']) :?>
										<div class="error">
											<?php echo $errors['rent'];?>
										</div>
										<?php endif;?>
									</div>
									<div class="row<?php echo ($errors['tuition']) ? ' error_row' : ''?>">
								    	<div class="label">Tuition fees:</div>
								    	<div class="input">
								    		&euro;<input type="text" name="tuition" id="tuition" value="<?php echo $_GET['tuition']; ?>" />
										</div>
										<?php if ($errors['tuition']) :?>
										<div class="error">
											<?php echo $errors['tuition'];?>
										</div>
										<?php endif;?>
									</div>
									<h3 class="clear">Tax Credits</h3>
									<div class="row<?php echo ($errors['incapacitated_child']) ? ' error_row' : ''?>">
								    	<div class="label">Do you have an incapacitated child?</div>
								    	<div class="input">
										    <select name="incapacitated_child" id="incapacitated_child">
										      <option value="0" <?php echo (isset($_GET['incapacitated_child']) && $_GET['incapacitated_child'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['incapacitated_child']) && $_GET['incapacitated_child'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['incapacitated_child']) ? ' error_row' : ''?>">
								    	<div class="label">Do you have a dependent relative?</div>
								    	<div class="input">
										    <select name="dependent_relative" id="dependent_relative" onchange="javascript:jQuery('#dependent_relative_income-row').toggle();">
										      <option value="0" <?php echo (isset($_GET['dependent_relative']) && $_GET['dependent_relative'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['dependent_relative']) && $_GET['dependent_relative'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div id="dependent_relative_income-row" class="row<?php echo ($errors['dependent_relative_income']) ? ' error_row' : ''; echo (!$_GET['dependent_relative']) ? ' hidden' : '';?>">
								    	<div class="label">What is their income?</div> 
								    	<div class="input">
								    		&euro;<input type="text" id="dependent_relative_income" name="dependent_relative_income" value="<?php echo $_GET['heath_insurance_contribution']; ?>" />
								    	</div>
								    	<?php if ($errors['dependent_relative_income']) :?>
										<div class="error">
											<?php echo $errors['dependent_relative_income'];?>
										</div>
										<?php endif;?>
									</div>
									<div id="widow-credit-details-row" <?php echo ($_GET['marital_status'] != 4) ? 'class="hidden"' : ''; ?>>
										<div class="row<?php echo ($errors['widow_year_bereavement']) ? ' error_row' : ''?>">
											<div class="label">Widowed Person in year of bereavement:</div>
											<div class="input"> 
												<select name="widow_year_bereavement" id="widow_year_bereavement">
											      <option value="0" <?php echo (isset($_GET['widow_year_bereavement']) && $_GET['widow_year_bereavement'] == 0) ? 'selected="selected"' : '';?>>No</option>
											      <option value="1" <?php echo (isset($_GET['widow_year_bereavement']) && $_GET['widow_year_bereavement'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
											    </select>
											</div>
									    </div>
									    <div class="row<?php echo ($errors['widow_parent_bereaved']) ? ' error_row' : ''?>">
									    	<div class="label">Widowed Parent Bereaved in:</div>
									    	<div class="input">
											    <select name="widow_parent_bereaved" id="widow_parent_bereaved">
												    <option value="0" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 0) ? 'selected="selected"' : '';?>>Pre 2005</option>
												    <option value="2006" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2006) ? 'selected="selected"' : '';?>>2005</option>
												    <option value="2007" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2007) ? 'selected="selected"' : '';?>>2006</option>
												    <option value="2008" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2008) ? 'selected="selected"' : '';?>>2007</option>
												    <option value="2009" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2009) ? 'selected="selected"' : '';?>>2008</option>
												    <option value="2010" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2010) ? 'selected="selected"' : '';?>>2009</option>
												    <option value="2011" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2011) ? 'selected="selected"' : '';?>>2010</option>
													<option value="2012" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2012) ? 'selected="selected"' : '';?>>2011</option>
													<option value="2014" <?php echo (isset($_GET['widow_parent_bereaved']) && $_GET['widow_parent_bereaved'] == 2014) ? 'selected="selected"' : '';?>>2014</option>
												</select>
											 </div>
									    </div>
									</div>
								    <div class="row<?php echo ($errors['blind']) ? ' error_row' : ''?>">
								    	<div class="label">Are you Blind?</div>
								    	<div class="input">
										    <select name="blind" id="blind">
										      <option value="0" <?php echo (isset($_GET['blind']) && $_GET['blind'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['blind']) && $_GET['blind'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['blind_spouse']) ? ' error_row' : ''?>">
								    	<div class="label">Is your spouse blind?</div>
								    	<div class="input">
										    <select name="blind_spouse" id="blind_spouse">
										      <option value="0" <?php echo (isset($_GET['blind_spouse']) && $_GET['blind_spouse'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['blind_spouse']) && $_GET['blind_spouse'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['guide_dog']) ? ' error_row' : ''?>">
								    	<div class="label">Do you have a guide dog?</div>
								    	<div class="input">
										    <select name="guide_dog" id="guide_dog">
										      <option value="0" <?php echo (isset($_GET['guide_dog']) && $_GET['guide_dog'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['guide_dog']) && $_GET['guide_dog'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['tuition']) ? ' error_row' : ''?>">
								    	<div class="label">Do you employ a carer?</div>
								    	<div class="input">
										    <select name="employ_carer" id="employ_carer">
										      <option value="0" <?php echo (isset($_GET['employ_carer']) && $_GET['employ_carer'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['employ_carer']) && $_GET['employ_carer'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <h3 class="clear">Credits &amp; Cutoffs</h3>
									<div class='row'>
								    	<div class="label">Do you know your cutoff?</div> 
										<div class="input">
											<select name="know_cutoff" id="know_cutoff" onchange="javascript:jQuery('#cutoff-details').toggle();">
										      <option value="0" <?php echo (isset($_GET['know_cutoff']) && $_GET['know_cutoff'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['know_cutoff']) && $_GET['know_cutoff'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div id="cutoff-details" <?php echo (!$_GET['know_cutoff']) ? 'class="hidden"' : '';?>>
									    <div class="row<?php echo ($errors['own_cutoff']) ? ' error_row' : ''?>">
									    	<div class="label">Cutoff:</div> 
									    	<div class="input">
									    		&euro;<input type="text" name="own_cutoff" id="own_cutoff" value="<?php echo $_GET['own_cutoff']; ?>" />
									    	</div>
									    	<?php if ($errors['own_cutoff']) :?>
											<div class="error">
												<?php echo $errors['own_cutoff'];?>
											</div>
											<?php endif;?>
										</div>
									</div>
								    <div class='row'>
								    	<div class="label">Do you know your credits total?</div> 
										<div class="input">
											<select name="know_credits" id="know_credits" onchange="javascript:jQuery('#own_credits_details').toggle();">
										      <option value="0" <?php echo (isset($_GET['know_credits']) && $_GET['know_credits'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['know_credits']) && $_GET['know_credits'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div id="own_credits_details" <?php echo (!$_GET['know_credits']) ? 'class="hidden"' : '';?>>
									    <div class="row<?php echo ($errors['own_credits']) ? ' error_row' : ''?>">
									    	<div class="label">Credits:</div> 
									    	<div class="input">
									    		&euro;<input type="text" name="own_credits" id="own_credits" value="<?php echo $_GET['own_credits']; ?>" />
									    	</div>
									    	<?php if ($errors['own_credits']) :?>
											<div class="error">
												<?php echo $errors['own_credits'];?>
											</div>
											<?php endif;?>
										</div>
									</div>
								</div>

							</div>
							<div style="clear:both; padding:20px;">
								<input type="submit" name="submit" value="Calculate" />
							</div>
							<input type="hidden" name="show_advanced" id="show_advanced" value="<?php echo (isset($_GET['show_advanced']) && $_GET['show_advanced'] == 1) ? '1' : '0';?>" />
						</form>