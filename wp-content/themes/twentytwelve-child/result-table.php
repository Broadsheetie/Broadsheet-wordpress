						<div class="desktop">
							A number in <span class="down">red number</span> means a negative impact you on, a <span class="up">green number</span> is a positive impact.
						</div> 
						<!-- div id="piechart"></div -->
						<table id="taxtable">
							<tr>
								<th>&nbsp;</th>
								<th class="desktop"><?php echo $year1; ?></th>
								<th><?php echo $year2; ?></th>
								<th class="desktop">Difference</th>
							</tr>
							<tr>
								<td><div id="gross" class="fake-link">Gross Income</div></td>
								<td class="desktop"><?php echo number_format(($breakdownYear1['gross'] + $breakdownYear1['spouseGross']), 0); ?></td>
								<td><?php echo number_format(($breakdownYear2['gross'] + $breakdownYear2['spouseGross']), 0); ?></td>
								<td class="desktop">&nbsp;</td>
							</tr>
							<tr class="gross-row hidden">
								<td class="sub-item">Salary</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['salary'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['salary'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<?php if ($breakdownYear1['nonTaxAdjustments'] || $breakdownYear1['nonTaxAdjustments']) :?>
							<tr class="gross-row hidden">
								<td class="sub-item">Employer Paid Health Insurance</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['nonTaxAdjustments'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['nonTaxAdjustments'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if ($breakdownYear1['carBik']) :?>
							<tr class="gross-row hidden">
								<td class="sub-item">Addition due to BIK on car</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['carBik'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['carBik'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if (($_GET['marital_status'] == 3) && ($breakdownYear1['spouseSalary'] || $breakdownYear1['spouseSalary'])) :?>
							<tr class="gross-row hidden">
								<td class="sub-item">Your Spouse's Salary</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['spouseSalary'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['spouseSalary'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if (isset($breakdownYear2['publicServicePension']) && ($breakdownYear2['publicServicePension']['Civil Service Pension'])) :?>
                                                        <tr>
                                                                <td><a href="http://taxcalc.ie/dictionary/civil-service-pension-contributions/" target="_blank"><img src="/images/information.png" width="16" height="16" alt="Information on the Civil Service Pension"></a><div id="public-service-pension" class="fake-link">Civil Service Pension</div></td>
                                                                <td class="desktop"><?php echo number_format(($breakdownYear1['publicServicePension']['Civil Service Pension']), 0); ?></td>
                                                                <td><?php echo number_format(($breakdownYear2['publicServicePension']['Civil Service Pension']), 0); ?></td>
                                                                <td class="desktop">&nbsp;</td>
                                                        </tr>
                                                        <?php if (isset($breakdownYear2['publicServicePension'])) :?>
                                                        <tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Contribution</td>
                                                                <td class="desktop"><?php echo number_format($breakdownYear1['publicServicePension']['Contribution'], 0); ?></td>
                                                                <td><?php echo number_format($breakdownYear2['publicServicePension']['Contribution'], 0); ?></td>
                                                                <td class="desktop">&nbsp;</td>
                                                        </tr>
							<?php if (isset($breakdownYear2['publicServicePension']['Spouse & child']) && $breakdownYear2['publicServicePension']['Spouse & child']) :?>
							<tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Spouse and child contribution (1.5%)</td>
                                                                <td class="desktop"><?php echo number_format($breakdownYear1['publicServicePension']['Spouse & child'], 0); ?></td>
                                                                <td><?php echo number_format($breakdownYear2['publicServicePension']['Spouse & child'], 0); ?></td>
                                                                <td class="desktop">&nbsp;</td>
                                                        </tr>
							<?php endif; ?>
                                                        <?php   if ($_GET['marital_status'] == 3) :?>
                                                        <tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Spouse's Contribution</td>
                                                                <td class="desktop"><?php echo number_format($breakdownYear1['publicServicePension']['Spouse']['Contribution'], 0); ?></td>
                                                                <td><?php echo number_format($breakdownYear2['publicServicePension']['Spouse']['Contribution'], 0); ?></td>
                                                                <td class="desktop">&nbsp;</td>
                                                        </tr>
                                                        <tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Spouse and child contribution (1.5%)</td>
                                                                <td class="desktop"><?php echo number_format($breakdownYear1['publicServicePension']['Spouse']['Spouse & child'], 0); ?></td>
                                                                <td><?php echo number_format($breakdownYear2['publicServicePension']['Spouse']['Spouse & child'], 0); ?></td>
                                                                <td class="desktop">&nbsp;</td>
                                                        </tr>
							<?php   endif;
                                                                endif;
                                                        endif; ?>
							<?php if (isset($breakdownYear1['pensionLevy']) || isset($breakdownYear2['pensionLevy'])) :?>
							<tr>
							<?php if ($breakdownYear2['pensionLevyBreakdown']) { ?>
								<td><a name='pension-levy' href='#pension-levy' onclick='$(".pension-levy-row").toggle();'>Pension Levy</a></td>
							<?php } else { ?>
								<td>Pension Levy</td>
							<?php }?>
								<td class="desktop"><?php echo number_format(($breakdownYear1['pensionLevy']), 0); ?></td>
								<td><?php echo number_format(($breakdownYear2['pensionLevy']), 0); ?></td>
								<td class="desktop">&nbsp;</td>
							</tr>
							<?php if (isset($breakdownYear1['pensionLevyBreakdown'])) :?>
							<tr class="pension-levy-row hidden">
								<td class="sub-item">Your Pension Levy</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['pensionLevyBreakdown']['Your Pension Levy'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['pensionLevyBreakdown']['Your Pension Levy'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<?php 	if ($_GET['marital_status'] == 3) :?>
							<tr class="pension-levy-row hidden">
								<td class="sub-item">Your spouse's Pension Levy</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['pensionLevyBreakdown']["Your Spouse's Pension Levy"], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['pensionLevyBreakdown']["Your Spouse's Pension Levy"], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<?php 	endif;
								endif;
							endif;?>
							<tr>
								<td><div id="taxable" class="fake-link">Taxable</div></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['taxable'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['taxable'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['taxable'] != $breakdownYear1['taxable']) ? (($breakdownYear2['taxable'] < $breakdownYear1['taxable']) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['taxable'] - $breakdownYear1['taxable'], 0); ?></td>
							</tr>
							<tr class="taxable-row hidden">
								<td class="sub-item">Salary</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['salary'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['salary'], 0); ?></td>
								<td class="desktop">&nbsp;</td>
							</tr>
							<?php if ($breakdownYear2['publicServicePension']['Civil Service Pension']) :?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Civil Service Pension</td>
								<td class="desktop">-<?php echo number_format($breakdownYear2['publicServicePension']['Civil Service Pension'], 0); ?></td>
								<td>-<?php echo number_format($breakdownYear1['publicServicePension']['Civil Service Pension'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<tr class="taxable-row hidden">
								<td class="sub-item">Pension Levy</td>
								<td class="desktop">-<?php echo number_format(($breakdownYear1['pensionLevy']), 0); ?></td>
								<td>-<?php echo number_format(($breakdownYear2['pensionLevy']), 0); ?></td>
								<td class="desktop">&nbsp;</td>
							</tr>
							<? endif; ?>
							<?php if ($breakdownYear1['carBik']) :?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Addition due to BIK on car</td>
								<td class="desktop">-<?php echo number_format($breakdownYear1['carBik'], 0); ?></td>
								<td>-<?php echo number_format($breakdownYear2['carBik'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if (isset($breakdownYear1['pensionRelief']) && $breakdownYear1['pensionRelief']) {?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Pension</td>
								<td class="desktop">-<?php echo number_format($breakdownYear1['pensionRelief'], 0); ?></td>
								<td>-<?php echo number_format($breakdownYear2['pensionRelief'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['pensionRelief'] != $breakdownYear1['pensionRelief']) ? (($breakdownYear2['pensionRelief'] > $breakdownYear1['pensionRelief']) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['pensionRelief'] - $breakdownYear1['pensionRelief'], 0); ?></td>
							</tr>
							<?php }?>
							<?php if (($_GET['marital_status'] == 3) && (isset($breakdownYear1['taxableBreakdown']["Your Spouse's taxable"]))) {?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Your spouse's taxable income</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['taxableBreakdown']["Your Spouse's taxable"], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['taxableBreakdown']["Your Spouse's taxable"], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['taxableBreakdown']["Your Spouse's taxable"] != $breakdownYear1['taxableBreakdown']["Your Spouse's taxable"]) ? (($breakdownYear2['taxableBreakdown']["Your Spouse's taxable"] > $breakdownYear1['taxableBreakdown']["Your Spouse's taxable"]) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['taxableBreakdown']["Your Spouse's taxable"] - $breakdownYear1['taxableBreakdown']["Your Spouse's taxable"], 0); ?></td>
							</tr>
							<?php }?>							
							<tr>
								<?php if ($_GET['marital_status'] == 3) {?>
								<td><div id="cutoff" class="fake-link">Cutoff</div></td>
								<?php } else { ?>
								<td>Cutoff</td>
								<?php }?>
								<td class="desktop"><?php echo number_format($breakdownYear1['cutoff'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['cutoff'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['cutoff'] != $breakdownYear1['cutoff']) ? (($breakdownYear2['cutoff'] > $breakdownYear1['cutoff']) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['cutoff'] - $breakdownYear1['cutoff'], 0); ?></td>
							</tr>
							<?php if (isset($breakdownYear1['cutoffBreakdown'])) :
									foreach ($breakdownYear1['cutoffBreakdown'] as $name => $value) {
							?>
							<tr class='cutoff-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td><?php echo (isset($breakdownYear1['cutoffBreakdown'][$name])) ? number_format($breakdownYear1['cutoffBreakdown'][$name], 0) : '&nbsp'?></td>
								<td class="desktop"><?php echo number_format($value, 0); ?></td>
								<?php if (isset($breakdownYear1['cutoffBreakdown'][$name])) { ?>
								<td class="desktop <?php echo ($breakdownYear2['cutoffBreakdown'][$name] != $breakdownYear1['cutoffBreakdown'][$name]) ? (($breakdownYear2['cutoffBreakdown'][$name] > $breakdownYear1['cutoffBreakdown'][$name]) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['cutoffBreakdown'][$name] - $breakdownYear1['cutoffBreakdown'][$name], 0); ?></td>
								<?php } else { ?>
								<td class="desktop">&nbsp;</td>
								<?php }?>
							</tr>
							<?php }
							endif;?>
							<tr>
								<td><a href="http://www.revenue.ie/en/tax/it/leaflets/it1.html#section1" target="_blank"><img src="/images/information.png" width="16" height="16" alt="Information on the Tax Credits"/></a><div class="fake-link" id="credit">Credits</div></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['credits'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['credits'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['credits'] != $breakdownYear1['credits']) ? (($breakdownYear2['credits'] > $breakdownYear1['credits']) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['credits'] - $breakdownYear1['credits'], 0); ?></td>
							</tr>
							<?php foreach ($breakdownYear2['creditBreakdown'] as $name => $value) {?>
							<tr class='credit-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td class="desktop"><?php echo (isset($breakdownYear1['creditBreakdown'][$name])) ? number_format($breakdownYear1['creditBreakdown'][$name], 0) : '&nbsp'?></td>
								<td><?php echo number_format($value, 0); ?></td>
								<?php if (isset($breakdownYear1['creditBreakdown'][$name])) { ?>
								<td class="desktop<?php echo ($breakdownYear2['creditBreakdown'][$name] != $breakdownYear1['creditBreakdown'][$name]) ? (($breakdownYear2['creditBreakdown'][$name] > $breakdownYear1['creditBreakdown'][$name]) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['creditBreakdown'][$name] - $breakdownYear1['creditBreakdown'][$name], 0); ?></td>
								<?php } else { ?>
								<td class="desktop">&nbsp;</td>
								<?php }?>
							</tr>
							<?php 
									if (isset($breakdownYear1['creditBreakdown'][$name])) unset($breakdownYear1['creditBreakdown'][$name]);
								}
								if (count($breakdownYear1['creditBreakdown']))
								{
									foreach ($breakdownYear1['creditBreakdown'] as $name => $value) {
							?>
							<tr class='credit-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td class="desktop"><?php echo (isset($breakdownYear1['creditBreakdown'][$name])) ? number_format($breakdownYear1['creditBreakdown'][$name],2) : '&nbsp'?></td>
								<td>N/A</td>
								<td class="desktop">&nbsp;</td>
							</tr>
							<?php 										
									}
								}
								?>
							<?php if ($breakdownYear1['extracredits'] || $breakdownYear2['extracredits']) {?>	
							<tr>
								<td><?php if (count($breakdownYear1['extraCreditsBreakdown']) || count($breakdownYear2['extraCreditsBreakdown'])) {?>
									<div id="extra-credit" class="fake-link">Other tax relief</div>
									<?php } else {?>
										Other tax relief
									<?php }?></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['extracredits'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['extracredits'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['extracredits'] != $breakdownYear1['extracredits']) ? (($breakdownYear2['extracredits'] > $breakdownYear1['extracredits']) ? 'up' : 'down') : '';?>"><?php echo number_format($breakdownYear2['extracredits'] - $breakdownYear1['extracredits'], 0); ?></td>
							</tr>
							<?php 	foreach ($breakdownYear1['extraCreditsBreakdown'] as $name => $value) {?>
							<tr class='extra-credit-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td class="desktop"><?php echo number_format($value, 0); ?></td>
								<td><?php echo (isset($breakdownYear2['extraCreditsBreakdown'][$name])) ? number_format($breakdownYear2['extraCreditsBreakdown'][$name], 0) : 'N\A' ?></td>
								<td class="desktop <?php echo ($breakdownYear2['extraCreditsBreakdown'][$name] != $breakdownYear1['extraCreditsBreakdown'][$name]) ? (($breakdownYear2['extraCreditsBreakdown'][$name] > $breakdownYear1['extraCreditsBreakdown'][$name]) ? 'up' : 'down'): '';?>"><?php echo number_format($breakdownYear2['extraCreditsBreakdown'][$name] - $breakdownYear1['extraCreditsBreakdown'][$name], 0); ?></td>
							</tr>
							<?php 		unset($breakdownYear2['extraCreditsBreakdown'][$name]);
									}
									foreach ($breakdownYear2['extraCreditsBreakdown'] as $name => $value) {?>
							<tr class='extra-credit-row hidden'>
								<td><?php echo $name;?></td>
								<td class="desktop">N/A</td>
								<td><?php echo number_format($breakdownYear2['extraCreditsBreakdown'][$name], 0); ?></td>
								<td class="desktop down"><?php echo '-' . number_format($breakdownYear2['extraCreditsBreakdown'][$name], 0); ?></td>
							</tr>
							<?php 	}
								}?>
							<tr>
							<td><a href="http://taxcalc.ie/dictionary/universal-social-charge-usc/"><img src="/images/information.png" width="16" height="16" alt="Information on the Universal Social Charge"/></a>
							<div id="usc" class="fake-link">Universal Social Charge</div>	
							</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['usc'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['usc'], 0); ?></td>
								<td class="desktop <?php if ($breakdownYear2['usc'] != $breakdownYear1['usc'] ) echo ($breakdownYear2['usc'] > $breakdownYear1['usc'] ) ? 'down' : 'up' ;?>"><?php echo number_format(abs($breakdownYear2['usc'] - $breakdownYear1['usc']), 0); ?></td>
							</tr>
							<?php if (is_array($breakdownYear1['uscBreakdown']['Your USC'])) : 
						 			foreach($breakdownYear2['uscBreakdown']['Your USC'] as $title => $row) :?>
							<tr class='usc-row hidden'>
								<td class="sub-item"><?php echo $title; ?></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['uscBreakdown']['Your USC'][$title]['amount'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['uscBreakdown']['Your USC'][$title]['amount'], 0); ?></td>
								<td class="desktop <?php if ($breakdownYear2['usc'] != $breakdownYear1['usc'] ) echo ($breakdownYear2['usc'] > $breakdownYear1['usc'] ) ? 'down' : 'up' ;?>"><?php echo number_format(abs($breakdownYear2['uscBreakdown']['Your USC'][$title]['amount'] - $breakdownYear1['uscBreakdown']['Your USC'][$title]['amount']), 0); ?></td>
							</tr>
							<?php 	endforeach;
								endif;
							?>
							<?php if (($_GET['marital_status'] == 3) && $breakdownYear2['spouseSalary']) : ?>
							<tr class='usc-row hidden'>
								<td class="sub-item">Spouse's USC</td>
								<td class="desktop">&nbsp;</td>
								<td>&nbsp;</td>								
								<td class="desktop">&nbsp;</td>
							</tr>
							<?php foreach($breakdownYear2['uscBreakdown']['Spouse USC'] as $title => $row) :?>
							<tr class='usc-row hidden'>
								<td class="sub-item"><?php echo $title; ?></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['uscBreakdown']['Spouse USC'][$title]['amount'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['uscBreakdown']['Spouse USC'][$title]['amount'], 0); ?></td>
								<td class="desktop <?php if ($breakdownYear2['usc'] != $breakdownYear1['usc'] ) echo ($breakdownYear2['usc'] > $breakdownYear1['usc'] ) ? 'down' : 'up' ;?>"><?php echo number_format(abs($breakdownYear2['uscBreakdown']['Spouse USC'][$title]['amount'] - $breakdownYear1['uscBreakdown']['Spouse USC'][$title]['amount']), 0); ?></td>
							</tr>
							<?php 	endforeach; ?>
							<?php endif; ?>
							<tr>
							<td><a href="http://taxcalc.ie/dictionary/pay-related-social-insurance-prsi/"><img src="/images/information.png" width="16" height="16" alt="Information on PRSI"/></a>
							<?php if (($_GET['marital_status'] == 3) && $breakdownYear2['spouseSalary']) { ?>
								<div id="prsi" class="fake-link">PRSI</div>
							<?php } else { ?>
								PRSI
							<?php }?>
								</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['prsi'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['prsi'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['prsi'] != $breakdownYear1['prsi']) ? (($breakdownYear2['prsi'] > $breakdownYear1['prsi']) ? 'down' : 'up') : '';?>"><?php echo number_format(abs($breakdownYear2['prsi'] - $breakdownYear1['prsi']), 0); ?></td>
							</tr>
							<?php if (($_GET['marital_status'] == 3) && $breakdownYear2['spouseSalary']) : ?>
							<tr class= "prsi-row hidden">
								<td class="sub-item">Your PRSI</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['prsiBreakdown']['Your PRSI'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['prsiBreakdown']['Your PRSI'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['prsiBreakdown']['Your PRSI'] != $breakdownYear1['prsiBreakdown']['Your PRSI']) ? (($breakdownYear2['prsiBreakdown']['Your PRSI'] > $breakdownYear1['prsiBreakdown']['Your PRSI']) ? 'up' : 'down') : '';?>"><?php echo number_format(abs($breakdownYear2['prsiBreakdown']['Your PRSI'] - $breakdownYear1['prsiBreakdown']['Your PRSI']), 0); ?></td>
							</tr>
							<tr class="prsi-row hidden">
								<td class="sub-item">Your spouse's PRSI</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['prsiBreakdown']['Spouse PRSI'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['prsiBreakdown']['Spouse PRSI'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['prsiBreakdown']['Spouse PRSI'] != $breakdownYear1['prsiBreakdown']['Spouse PRSI']) ? (($breakdownYear2['prsiBreakdown']['Spouse PRSI'] > $breakdownYear1['prsiBreakdown']['Spouse PRSI']) ? 'up' : 'down') : '';?>"><?php echo number_format(abs($breakdownYear2['prsiBreakdown']['Spouse PRSI'] - $breakdownYear1['prsiBreakdown']['Spouse PRSI']), 0); ?></td>
							</tr>
							<?php endif;?>														
							<tr>
								<td><div id="tax" class="fake-link">Gross Tax</div></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['grossTax'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['grossTax'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['grossTax'] != $breakdownYear1['grossTax']) ? (($breakdownYear2['grossTax'] > $breakdownYear1['grossTax']) ? 'down' : 'up') : '';?>"><?php echo number_format(abs($breakdownYear2['grossTax'] - $breakdownYear1['grossTax']), 0); ?></td>
							</tr>
							<?php foreach($breakdownYear1['taxBreakdown'] as $taxRate => $taxItem) :?>
							<tr class="tax-row hidden">
								<td class="sub-item"><?php echo $taxRate;?></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['taxBreakdown'][$taxRate]['amount'], 0)?></td>
								<td><?php echo number_format($breakdownYear2['taxBreakdown'][$taxRate]['amount'], 0)?></td>
								<td class="desktop <?php echo ($breakdownYear2['taxBreakdown'][$taxRate]['amount'] != $breakdownYear1['taxBreakdown'][$taxRate]['amount']) ? (($breakdownYear2['taxBreakdown'][$taxRate]['amount'] > $breakdownYear1['taxBreakdown'][$taxRate]['amount']) ? 'down' : 'up') : '';?>"><?php echo number_format(abs($breakdownYear2['taxBreakdown'][$taxRate]['amount'] - $breakdownYear1['taxBreakdown'][$taxRate]['amount']), 0); ?></td>
							</tr>	
							<?php 
										unset($breakdownYear2['taxBreakdown'][$taxRate]);
									endforeach;
									if (count($breakdownYear2['taxBreakdown'])) :
										foreach ($breakdownYear2['taxBreakdown'] as $taxRate => $taxItem) :		
							?>						
							<tr class="tax-row hidden">
								<td class="sub-item"><?php echo $taxRate;?></td>
								<td class="desktop">N/A</td>
								<td><?php echo $breakdownYear2['taxBreakdown'][$taxRate]['amount']?></td>
								<td class="desktop down"><?php echo number_format($breakdownYear2['taxBreakdown'][$taxRate]['amount'], 0); ?></td>
							</tr>							
							<?php 
										endforeach;
									endif;
							?>
							<?php if ($breakdownYear2['house']) { ?>
							<tr>
								<td><a href="http://taxcalc.ie/dictionary/local-property-tax-lpt/"><img src="/images/information.png" width="16" height="16" alt="Information on Local Property Tax"/></a>Local Property Tax</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['house'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['house'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['house'] != $breakdownYear1['house']) ? (($breakdownYear2['house'] > $breakdownYear1['house']) ? 'down' : 'up') : '';?>"><?php echo number_format(abs($breakdownYear2['house'] - $breakdownYear1['house']), 0); ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td>Income Tax</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['tax'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['tax'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['tax'] != $breakdownYear1['tax']) ? (($breakdownYear2['tax'] > $breakdownYear1['tax']) ? 'down' : 'up') : '';?>"><?php echo number_format(abs($breakdownYear2['tax'] - $breakdownYear1['tax']), 0); ?></td>
							</tr>
							<?php if ($breakdownYear1['nonTaxAdjustments'] || $breakdownYear2['nonTaxAdjustments']) :?>
							<tr>
								<td>Non-Tax Adjustments</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['nonTaxAdjustments'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['nonTaxAdjustments'], 0); ?></td>
								<td class="desktop">&nbsp;</td>	
							</tr>							
							<?php endif;?>
							<tr>
								<td><div id="net" class="fake-link">Net Income</div></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['net'] - $breakdownYear1['nonTaxAdjustments'], 0); ?></td>
								<td><?php echo number_format($breakdownYear2['net'] - $breakdownYear2['nonTaxAdjustments'], 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['net'] != $breakdownYear1['net']) ? (($breakdownYear2['net'] > $breakdownYear1['net']) ? 'up' : 'down') : '';?>"><?php echo number_format(($breakdownYear2['net'] - $breakdownYear1['net']) - ($breakdownYear1['child_benefit'] - $breakdownYear2['child_benefit']), 0); ?></td>
							</tr>
							<tr class="net-row hidden">
								<td class="sub-item">Per month</td>
								<td class="desktop"><?php echo number_format(($breakdownYear1['net'] - $breakdownYear1['nonTaxAdjustments']) / 12, 0); ?></td>
								<td><?php echo number_format(($breakdownYear2['net'] - $breakdownYear2['nonTaxAdjustments']) / 12, 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['net'] != $breakdownYear1['net']) ? (($breakdownYear2['net'] > $breakdownYear1['net']) ? 'up' : 'down') : '';?>"><?php echo number_format(($breakdownYear2['net'] - $breakdownYear1['net'] - ($breakdownYear1['child_benefit'] - $breakdownYear2['child_benefit'])) / 12, 0); ?></td>
							</tr>
							<tr class="net-row hidden">
								<td class="sub-item">Per fortnight</td>
								<td class="desktop"><?php echo number_format(($breakdownYear1['net'] - $breakdownYear1['nonTaxAdjustments']) / 26, 0); ?></td>
								<td><?php echo number_format(($breakdownYear2['net'] - $breakdownYear2['nonTaxAdjustments']) / 26, 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['net'] != $breakdownYear1['net']) ? (($breakdownYear2['net'] > $breakdownYear1['net']) ? 'up' : 'down') : '';?>"><?php echo number_format(($breakdownYear2['net'] - $breakdownYear1['net'] - ($breakdownYear1['child_benefit'] - $breakdownYear2['child_benefit'])) / 26, 0); ?></td>
							</tr>
							<tr class="net-row hidden">
								<td class="sub-item">Per week</td>
								<td class="desktop"><?php echo number_format(($breakdownYear1['net'] - $breakdownYear1['nonTaxAdjustments']) / 52, 0); ?></td>
								<td><?php echo number_format(($breakdownYear2['net'] - $breakdownYear2['nonTaxAdjustments']) / 52, 0); ?></td>
								<td class="desktop <?php echo ($breakdownYear2['net'] != $breakdownYear1['net']) ? (($breakdownYear2['net'] > $breakdownYear1['net']) ? 'up' : 'down') : '';?>"><?php echo number_format(($breakdownYear2['net'] - $breakdownYear1['net'] - ($breakdownYear1['child_benefit'] - $breakdownYear2['child_benefit'])) / 52, 0); ?></td>
							</tr>
							<?php if ($_GET['children']) : ?>
							<tr>
								<td>Child Benefit</td>
								<td class="desktop"><?php echo number_format($breakdownYear1['child_benefit']); ?></td>
								<td><?php echo number_format($breakdownYear2['child_benefit']); ?></td>
								<td class="desktop"><?php echo number_format($breakdownYear1['child_benefit'] - $breakdownYear2['child_benefit'], 0)?></td>
							</tr>
							<?php endif; ?>
						</table>