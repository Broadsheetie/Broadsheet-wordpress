<?php
/**
 * Template Name: Calculator13 
 *
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

include '/home/b553569/public_html/calculator/boot.php';

if (count($_GET))
{
	$calc2012 = Tax::factory(2012);

        if ($calc2012->setDetails($_GET))
        {
		if ($_GET['tax_benefit']) $calc2012->taxBenefit();
                $calc2012->calculate();
                $breakdown2012 = $calc2012->getBreakdown();
        }
        else
        {
        	$errors = $calc2012->getErrors();
        }

	$calc2013 = Tax::factory(2013);

        if ($calc2013->setDetails($_GET))
        {
		if ($_GET['tax_benefit']) $calc2013->taxBenefit();
		//$calc2013->setPrsi($_GET['prsi']/ 100);
        //$calc2013->setTopUsc($_GET['usc'] / 100);
				$calc2013->calculate();
                $breakdown2013 = $calc2013->getBreakdown();
//              echo '<pre>' . print_r($breakdown2013, 1) . '</pre>';
        }

	if (count($errors))
        {
                if (isset($errors['gross']))
                {
                        $basicError = true;
                }
                if (isset($errors['pension']) || isset($errors['avc']))
                {
                        $pensionError = true;
                }
                if ((isset($errors['original-market-value'])) || (isset($errors['running-cost'])) || (isset($errors['heath-insurance-contribution'])))
                {
                        $bikError = true;
                }
                if (isset($errors['tuition']))
                {
                        $reliefError = true;
                }
	}

	

}

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
</div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<div id="post-calc" class="post-calc page type-page hentry">																	
					<div class="entry-content">
						<?php if ($breakdown2013) :?>
						A number in <span class="down">red number</span> means a negative impact you on, a <span class="up">green number</span> is a positive impact. 
						<table id="taxtable">
							<tr>
								<th>&nbsp;</th>
								<th>2012</th>
								<th>2013</th>
								<th>Difference</th>
							</tr>
							<tr>
								<td><div id="gross" class="fake-link">Gross Income</div></td>
								<td><?php echo number_format(($breakdown2012['gross'] + $breakdown2012['spouseGross']), 2); ?></td>
								<td><?php echo number_format(($breakdown2013['gross'] + $breakdown2013['spouseGross']), 2); ?></td>
								<td>&nbsp;</td>
							</tr>
							<tr class="gross-row hidden">
								<td class="sub-item">Salary</td>
								<td><?php echo number_format($breakdown2012['salary'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['salary'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<?php if ($breakdown2012['nonTaxAdjustments'] || $breakdown2012['nonTaxAdjustments']) :?>
							<tr class="gross-row hidden">
								<td class="sub-item">Employer Paid Health Insurance</td>
								<td><?php echo number_format($breakdown2012['nonTaxAdjustments'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['nonTaxAdjustments'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if ($breakdown2012['carBik']) :?>
							<tr class="gross-row hidden">
								<td class="sub-item">Addition due to BIK on car</td>
								<td><?php echo number_format($breakdown2012['carBik'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['carBik'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if (($_GET['marital-status'] == 3) && ($breakdown2012['spouseSalary'] || $breakdown2012['spouseSalary'])) :?>
							<tr class="gross-row hidden">
								<td class="sub-item">Your Spouse's Salary</td>
								<td><?php echo number_format($breakdown2012['spouseSalary'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['spouseSalary'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if (isset($breakdown2013['publicServicePension']) && ($breakdown2013['publicServicePension']['Civil Service Pension'])) :?>
                                                        <tr>
                                                                <td><a href="http://taxcalc.ie/dictionary/civil-service-pension-contributions/" target="_blank"><img src="/images/information.png" width="16" height="16" alt="Information on the Civil Service Pension"></a><a name='public-service-pension' href='#public-service-pension' onclick='$(".public-service-pension-row").toggle();'>Civil Service Pension</a></td>
                                                                <td><?php echo number_format(($breakdown2012['publicServicePension']['Civil Service Pension']), 2); ?></td>
                                                                <td><?php echo number_format(($breakdown2013['publicServicePension']['Civil Service Pension']), 2); ?></td>
                                                                <td>&nbsp;</td>
                                                        </tr>
                                                        <?php if (isset($breakdown2013['publicServicePension'])) :?>
                                                        <tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Contribution</td>
                                                                <td><?php echo number_format($breakdown2012['publicServicePension']['Contribution'], 2); ?></td>
                                                                <td><?php echo number_format($breakdown2013['publicServicePension']['Contribution'], 2); ?></td>
                                                                <td>&nbsp;</td>
                                                        </tr>
							<?php if (isset($breakdown2013['publicServicePension']['Spouse & child']) && $breakdown2013['publicServicePension']['Spouse & child']) :?>
							<tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Spouse and child contribution (1.5%)</td>
                                                                <td><?php echo number_format($breakdown2012['publicServicePension']['Spouse & child'], 2); ?></td>
                                                                <td><?php echo number_format($breakdown2013['publicServicePension']['Spouse & child'], 2); ?></td>
                                                                <td>&nbsp;</td>
                                                        </tr>
							<?php endif; ?>
                                                        <?php   if ($_GET['marital-status'] == 3) :?>
                                                        <tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Spouse's Contribution</td>
                                                                <td><?php echo number_format($breakdown2012['publicServicePension']['Spouse']['Contribution'], 2); ?></td>
                                                                <td><?php echo number_format($breakdown2013['publicServicePension']['Spouse']['Contribution'], 2); ?></td>
                                                                <td>&nbsp;</td>
                                                        </tr>
                                                        <tr class="public-service-pension-row hidden">
                                                                <td class="sub-item">Spouse and child contribution (1.5%)</td>
                                                                <td><?php echo number_format($breakdown2012['publicServicePension']['Spouse']['Spouse & child'], 2); ?></td>
                                                                <td><?php echo number_format($breakdown2013['publicServicePension']['Spouse']['Spouse & child'], 2); ?></td>
                                                                <td>&nbsp;</td>
                                                        </tr>
							<?php   endif;
                                                                endif;
                                                        endif; ?>
							<?php if (isset($breakdown2012['pensionLevy']) || isset($breakdown2013['pensionLevy'])) :?>
							<tr>
							<?php if ($breakdown2013['pensionLevyBreakdown']) { ?>
								<td><a name='pension-levy' href='#pension-levy' onclick='$(".pension-levy-row").toggle();'>Pension Levy</a></td>
							<?php } else { ?>
								<td>Pension Levy</td>
							<?php }?>
								<td><?php echo number_format(($breakdown2012['pensionLevy']), 2); ?></td>
								<td><?php echo number_format(($breakdown2013['pensionLevy']), 2); ?></td>
								<td>&nbsp;</td>
							</tr>
							<?php if (isset($breakdown2012['pensionLevyBreakdown'])) :?>
							<tr class="pension-levy-row hidden">
								<td class="sub-item">Your Pension Levy</td>
								<td><?php echo number_format($breakdown2012['pensionLevyBreakdown']['Your Pension Levy'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['pensionLevyBreakdown']['Your Pension Levy'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<?php 	if ($_GET['marital-status'] == 3) :?>
							<tr class="pension-levy-row hidden">
								<td class="sub-item">Your spouse's Pension Levy</td>
								<td><?php echo number_format($breakdown2012['pensionLevyBreakdown']["Your Spouse's Pension Levy"], 2); ?></td>
								<td><?php echo number_format($breakdown2013['pensionLevyBreakdown']["Your Spouse's Pension Levy"], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<?php 	endif;
								endif;
							endif;?>
							<tr>
								<td><div id="taxable" class="fake-link">Taxable</div></td>
								<td><?php echo number_format($breakdown2012['taxable'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['taxable'], 2); ?></td>
								<td <?php echo ($breakdown2013['taxable'] != $breakdown2012['taxable']) ? 'class="' . (($breakdown2013['taxable'] < $breakdown2012['taxable']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['taxable'] - $breakdown2012['taxable'], 2); ?></td>
							</tr>
							<tr class="taxable-row hidden">
								<td class="sub-item">Salary</td>
								<td><?php echo number_format($breakdown2012['salary'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['salary'], 2); ?></td>
								<td>&nbsp;</td>
							</tr>
							<?php if ($breakdown2013['publicServicePension']['Civil Service Pension']) :?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Civil Service Pension</td>
								<td>-<?php echo number_format($breakdown2013['publicServicePension']['Civil Service Pension'], 2); ?></td>
								<td>-<?php echo number_format($breakdown2012['publicServicePension']['Civil Service Pension'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<tr class="taxable-row hidden">
								<td class="sub-item">Pension Levy</td>
								<td>-<?php echo number_format(($breakdown2012['pensionLevy']), 2); ?></td>
								<td>-<?php echo number_format(($breakdown2013['pensionLevy']), 2); ?></td>
								<td>&nbsp;</td>
							</tr>
							<? endif; ?>
							<?php if ($breakdown2012['carBik']) :?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Addition due to BIK on car</td>
								<td>-<?php echo number_format($breakdown2012['carBik'], 2); ?></td>
								<td>-<?php echo number_format($breakdown2013['carBik'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>
							<?php endif;?>
							<?php if (isset($breakdown2012['pensionRelief']) && $breakdown2012['pensionRelief']) {?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Pension</td>
								<td>-<?php echo number_format($breakdown2012['pensionRelief'], 2); ?></td>
								<td>-<?php echo number_format($breakdown2013['pensionRelief'], 2); ?></td>
								<td <?php echo ($breakdown2013['pensionRelief'] != $breakdown2012['pensionRelief']) ? 'class="' . (($breakdown2013['pensionRelief'] > $breakdown2012['pensionRelief']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['pensionRelief'] - $breakdown2012['pensionRelief'], 2); ?></td>
							</tr>
							<?php }?>
							<?php if (($_GET['marital-status'] == 3) && (isset($breakdown2012['taxableBreakdown']["Your Spouse's taxable"]))) {?>
							<tr class="taxable-row hidden">
								<td class="sub-item">Your spouse's taxable income</td>
								<td><?php echo number_format($breakdown2012['taxableBreakdown']["Your Spouse's taxable"], 2); ?></td>
								<td><?php echo number_format($breakdown2013['taxableBreakdown']["Your Spouse's taxable"], 2); ?></td>
								<td <?php echo ($breakdown2013['taxableBreakdown']["Your Spouse's taxable"] != $breakdown2012['taxableBreakdown']["Your Spouse's taxable"]) ? 'class="' . (($breakdown2013['taxableBreakdown']["Your Spouse's taxable"] > $breakdown2012['taxableBreakdown']["Your Spouse's taxable"]) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['taxableBreakdown']["Your Spouse's taxable"] - $breakdown2012['taxableBreakdown']["Your Spouse's taxable"], 2); ?></td>
							</tr>
							<?php }?>							
							<tr>
								<?php if ($_GET['marital-status'] == 3) {?>
								<td><div id="cutoff" class="fake-link">Cutoff</div></td>
								<?php } else { ?>
								<td>Cutoff</td>
								<?php }?>
								<td><?php echo number_format($breakdown2012['cutoff'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['cutoff'], 2); ?></td>
								<td <?php echo ($breakdown2013['cutoff'] != $breakdown2012['cutoff']) ? 'class="' . (($breakdown2013['cutoff'] > $breakdown2012['cutoff']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['cutoff'] - $breakdown2012['cutoff'], 2); ?></td>
							</tr>
							<?php if (isset($breakdown2012['cutoffBreakdown'])) :
									foreach ($breakdown2012['cutoffBreakdown'] as $name => $value) {
							?>
							<tr class='cutoff-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td><?php echo (isset($breakdown2012['cutoffBreakdown'][$name])) ? number_format($breakdown2012['cutoffBreakdown'][$name], 2) : '&nbsp'?></td>
								<td><?php echo number_format($value, 2); ?></td>
								<?php if (isset($breakdown2012['cutoffBreakdown'][$name])) { ?>
								<td <?php echo ($breakdown2013['cutoffBreakdown'][$name] != $breakdown2012['cutoffBreakdown'][$name]) ? 'class="' . (($breakdown2013['cutoffBreakdown'][$name] > $breakdown2012['cutoffBreakdown'][$name]) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['cutoffBreakdown'][$name] - $breakdown2012['cutoffBreakdown'][$name], 2); ?></td>
								<?php } else { ?>
								<td>&nbsp;</td>
								<?php }?>
							</tr>
							<?php }
							endif;?>
							<tr>
								<td><a href="http://www.revenue.ie/en/tax/it/leaflets/it1.html#section1" target="_blank"><img src="/images/information.png" width="16" height="16" alt="Information on the Tax Credits"/></a><div class="fake-link" id="credit">Credits</div></td>
								<td><?php echo number_format($breakdown2012['credits'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['credits'], 2); ?></td>
								<td <?php echo ($breakdown2013['credits'] != $breakdown2012['credits']) ? 'class="' . (($breakdown2013['credits'] > $breakdown2012['credits']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['credits'] - $breakdown2012['credits'], 2); ?></td>
							</tr>
							<?php foreach ($breakdown2013['creditBreakdown'] as $name => $value) {?>
							<tr class='credit-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td><?php echo (isset($breakdown2012['creditBreakdown'][$name])) ? number_format($breakdown2012['creditBreakdown'][$name], 2) : '&nbsp'?></td>
								<td><?php echo number_format($value, 2); ?></td>
								<?php if (isset($breakdown2012['creditBreakdown'][$name])) { ?>
								<td <?php echo ($breakdown2013['creditBreakdown'][$name] != $breakdown2012['creditBreakdown'][$name]) ? 'class="' . (($breakdown2013['creditBreakdown'][$name] > $breakdown2012['creditBreakdown'][$name]) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['creditBreakdown'][$name] - $breakdown2012['creditBreakdown'][$name], 2); ?></td>
								<?php } else { ?>
								<td>&nbsp;</td>
								<?php }?>
							</tr>
							<?php 
									if (isset($breakdown2012['creditBreakdown'][$name])) unset($breakdown2012['creditBreakdown'][$name]);
								}
								if (count($breakdown2012['creditBreakdown']))
								{
									foreach ($breakdown2012['creditBreakdown'] as $name => $value) {
							?>
							<tr class='credit-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td><?php echo (isset($breakdown2012['creditBreakdown'][$name])) ? number_format($breakdown2012['creditBreakdown'][$name],2) : '&nbsp'?></td>
								<td>N/A</td>
								<td>&nbsp;</td>
							</tr>
							<?php 										
									}
								}
								?>
							<?php if ($breakdown2012['extracredits'] || $breakdown2013['extracredits']) {?>	
							<tr>
								<td><?php if (count($breakdown2012['extraCreditsBreakdown']) || count($breakdown2013['extraCreditsBreakdown'])) {?>
									<div id="extra-credit" class="fake-link">Other tax relief</div>
									<?php } else {?>
										Other tax relief
									<?php }?></td>
								<td><?php echo number_format($breakdown2012['extracredits'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['extracredits'], 2); ?></td>
								<td <?php echo ($breakdown2013['extracredits'] != $breakdown2012['extracredits']) ? 'class="' . (($breakdown2013['extracredits'] > $breakdown2012['extracredits']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['extracredits'] - $breakdown2012['extracredits'], 2); ?></td>
							</tr>
							<?php 	foreach ($breakdown2012['extraCreditsBreakdown'] as $name => $value) {?>
							<tr class='extra-credit-row hidden'>
								<td class="sub-item"><?php echo $name;?></td>
								<td><?php echo number_format($value, 2); ?></td>
								<td><?php echo (isset($breakdown2013['extraCreditsBreakdown'][$name])) ? number_format($breakdown2013['extraCreditsBreakdown'][$name], 2) : 'N\A' ?></td>
								<td <?php echo ($breakdown2013['extraCreditsBreakdown'][$name] != $breakdown2012['extraCreditsBreakdown'][$name]) ? 'class="' . (($breakdown2013['extraCreditsBreakdown'][$name] > $breakdown2012['extraCreditsBreakdown'][$name]) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['extraCreditsBreakdown'][$name] - $breakdown2012['extraCreditsBreakdown'][$name], 2); ?></td>
							</tr>
							<?php 		unset($breakdown2013['extraCreditsBreakdown'][$name]);
									}
									foreach ($breakdown2013['extraCreditsBreakdown'] as $name => $value) {?>
							<tr class='extra-credit-row hidden'>
								<td><?php echo $name;?></td>
								<td>N/A</td>
								<td><?php echo number_format($breakdown2013['extraCreditsBreakdown'][$name], 2); ?></td>
								<td class='down'><?php echo '-' . number_format($breakdown2013['extraCreditsBreakdown'][$name], 2); ?></td>
							</tr>
							<?php 	}
								}?>
							<tr>
							<td><a href="http://taxcalc.ie/dictionary/universal-social-charge-usc/"><img src="/images/information.png" width="16" height="16" alt="Information on the Universal Social Charge"/></a>
							<?php if (($_GET['marital-status'] == 3) && $breakdown2013['spouseSalary']) { ?>
								<div id="usc" class="fake-link">Universal Social Charge</div>
							<?php } else { ?>
								Universal Social Charge
							<?php }?>	
							</td>
								<td><?php echo number_format($breakdown2012['usc'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['usc'], 2); ?></td>
								<td class="<?php if ($breakdown2013['usc'] > $breakdown2012['usc'] ) echo (($breakdown2013['usc'] > $breakdown2012['usc'] ) ? 'down' : 'up' );?>"><?php echo number_format(abs($breakdown2013['usc'] - $breakdown2012['usc']), 2); ?></td>
							</tr>
							<?php if (($_GET['marital-status'] == 3) && $breakdown2013['spouseSalary']) : ?>
							<tr class='usc-row hidden'>
								<td class="sub-item">Your USC</td>
								<td><?php echo number_format($breakdown2012['uscBreakdown']['Your USC'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['uscBreakdown']['Your USC'], 2); ?></td>
								<td>&nbsp;</td>
							</tr>
							<tr class='usc-row hidden'>
								<td class="sub-item">Spouse's USC</td>
								<td><?php echo number_format($breakdown2012['uscBreakdown']['Spouse USC'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['uscBreakdown']['Spouse USC'], 2); ?></td>
								<td>&nbsp;</td>
							</tr>
							<?php endif; ?>
							<tr>
							<td><a href="http://taxcalc.ie/dictionary/pay-related-social-insurance-prsi/"><img src="/images/information.png" width="16" height="16" alt="Information on PRSI"/></a>
							<?php if (($_GET['marital-status'] == 3) && $breakdown2013['spouseSalary']) { ?>
								<div id="prsi" class="fake-link">PRSI</div>
							<?php } else { ?>
								PRSI
							<?php }?>
								</td>
								<td><?php echo number_format($breakdown2012['prsi'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['prsi'], 2); ?></td>
								<td<?php echo ($breakdown2013['prsi'] != $breakdown2012['prsi']) ? ' class="' . (($breakdown2013['prsi'] > $breakdown2012['prsi']) ? 'down' : 'up') . '"' : '';?>><?php echo number_format($breakdown2013['prsi'] - $breakdown2012['prsi'], 2); ?></td>
							</tr>
							<?php if (($_GET['marital-status'] == 3) && $breakdown2013['spouseSalary']) : ?>
							<tr class= "prsi-row hidden">
								<td class="sub-item">Your PRSI</td>
								<td><?php echo number_format($breakdown2012['prsiBreakdown']['Your PRSI'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['prsiBreakdown']['Your PRSI'], 2); ?></td>
								<td<?php echo ($breakdown2013['prsiBreakdown']['Your PRSI'] != $breakdown2012['prsiBreakdown']['Your PRSI']) ? ' class="' . (($breakdown2013['prsiBreakdown']['Your PRSI'] > $breakdown2012['prsiBreakdown']['Your PRSI']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['prsiBreakdown']['Your PRSI'] - $breakdown2012['prsiBreakdown']['Your PRSI'], 2); ?></td>
							</tr>
							<tr class="prsi-row hidden">
								<td class="sub-item">Your spouse's PRSI</td>
								<td><?php echo number_format($breakdown2012['prsiBreakdown']['Spouse PRSI'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['prsiBreakdown']['Spouse PRSI'], 2); ?></td>
								<td<?php echo ($breakdown2013['prsiBreakdown']['Spouse PRSI'] != $breakdown2012['prsiBreakdown']['Spouse PRSI']) ? ' class="' . (($breakdown2013['prsiBreakdown']['Spouse PRSI'] > $breakdown2012['prsiBreakdown']['Spouse PRSI']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['prsiBreakdown']['Spouse PRSI'] - $breakdown2012['prsiBreakdown']['Spouse PRSI'], 2); ?></td>
							</tr>
							<?php endif;?>														
							<tr>
								<td><div id="tax" class="fake-link">Gross Tax</div></td>
								<td><?php echo number_format($breakdown2012['grossTax'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['grossTax'], 2); ?></td>
								<td <?php echo ($breakdown2013['grossTax'] != $breakdown2012['grossTax']) ? 'class="' . (($breakdown2013['grossTax'] > $breakdown2012['grossTax']) ? 'down' : 'up') . '"' : '';?>><?php echo number_format($breakdown2013['grossTax'] - $breakdown2012['grossTax'], 2); ?></td>
							</tr>
							<?php foreach($breakdown2012['taxBreakdown'] as $taxRate => $taxItem) :?>
							<tr class="tax-row hidden">
								<td class="sub-item"><?php echo $taxRate;?></td>
								<td><?php echo number_format($breakdown2012['taxBreakdown'][$taxRate]['amount'], 2)?></td>
								<td><?php echo number_format($breakdown2013['taxBreakdown'][$taxRate]['amount'], 2)?></td>
								<td <?php echo ($breakdown2013['taxBreakdown'][$taxRate]['amount'] != $breakdown2012['taxBreakdown'][$taxRate]['amount']) ? 'class="' . (($breakdown2013['taxBreakdown'][$taxRate]['amount'] > $breakdown2012['taxBreakdown'][$taxRate]['amount']) ? 'down' : 'up') . '"' : '';?>><?php echo number_format(abs($breakdown2013['taxBreakdown'][$taxRate]['amount'] - $breakdown2012['taxBreakdown'][$taxRate]['amount']), 2); ?></td>
							</tr>	
							<?php 
										unset($breakdown2013['taxBreakdown'][$taxRate]);
									endforeach;
									if (count($breakdown2013['taxBreakdown'])) :
										foreach ($breakdown2013['taxBreakdown'] as $taxRate => $taxItem) :		
							?>						
							<tr class="tax-row hidden">
								<td class="sub-item"><?php echo $taxRate;?></td>
								<td>N/A</td>
								<td><?php echo $breakdown2013['taxBreakdown'][$taxRate]['amount']?></td>
								<td class="down"><?php echo number_format($breakdown2013['taxBreakdown'][$taxRate]['amount'], 2); ?></td>
							</tr>							
							<?php 
										endforeach;
									endif;
							?>
							<?php if ($breakdown2013['house']) { ?>
							<tr>
								<td>Property Tax</td>
								<td>N/A</td>
								<td class="down"><?php echo number_format($breakdown2013['house'], 2); ?></td>
								<td class="down"><?php echo number_format($breakdown2013['house'], 2); ?></td>
							</tr>
							<?php } ?>
							<tr>
								<td>Income Tax</td>
								<td><?php echo number_format($breakdown2012['tax'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['tax'], 2); ?></td>
								<td <?php echo ($breakdown2013['tax'] != $breakdown2012['tax']) ? 'class="' . (($breakdown2013['tax'] > $breakdown2012['tax']) ? 'down' : 'up') . '"' : '';?>><?php echo number_format($breakdown2013['tax'] - $breakdown2012['tax'], 2); ?></td>
							</tr>
							<?php if ($breakdown2012['nonTaxAdjustments'] || $breakdown2013['nonTaxAdjustments']) :?>
							<tr>
								<td>Non-Tax Adjustments</td>
								<td><?php echo number_format($breakdown2012['nonTaxAdjustments'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['nonTaxAdjustments'], 2); ?></td>
								<td>&nbsp;</td>	
							</tr>							
							<?php endif;?>
							<?php if ($_GET['children']) : ?>
							<tr>
								<td>Child Benefit</td>
								<td><?php echo number_format($breakdown2012['child_benefit']); ?></td>
								<td><?php echo number_format($breakdown2013['child_benefit']); ?></td>
								<td class="down"><?php echo number_format($breakdown2012['child_benefit'] - $breakdown2013['child_benefit'], 2)?></td>
							</tr>
							<?php endif; ?>
							<tr>
								<td><div id="net" class="fake-link">Net Income</div></td>
								<td><?php echo number_format($breakdown2012['net'] - $breakdown2012['nonTaxAdjustments'] + $breakdown2012['child_benefit'], 2); ?></td>
								<td><?php echo number_format($breakdown2013['net'] - $breakdown2013['nonTaxAdjustments'] + $breakdown2013['child_benefit'], 2); ?></td>
								<td <?php echo ($breakdown2013['net'] != $breakdown2012['net']) ? 'class="' . (($breakdown2013['net'] > $breakdown2012['net']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format($breakdown2013['net'] - $breakdown2012['net'] - ($breakdown2012['child_benefit'] - $breakdown2013['child_benefit']), 2); ?></td>
							</tr>
							<tr class="net-row hidden">
								<td class="sub-item">Per month</td>
								<td><?php echo number_format(($breakdown2012['net'] - $breakdown2012['nonTaxAdjustments']) / 13, 2); ?></td>
								<td><?php echo number_format(($breakdown2013['net'] - $breakdown2013['nonTaxAdjustments']) / 13, 2); ?></td>
								<td <?php echo ($breakdown2013['net'] != $breakdown2012['net']) ? 'class="' . (($breakdown2013['net'] > $breakdown2012['net']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format(($breakdown2013['net'] - $breakdown2012['net'] - ($breakdown2012['child_benefit'] - $breakdown2013['child_benefit'])) / 13, 2); ?></td>
							</tr>
							<tr class="net-row hidden">
								<td class="sub-item">Per fortnight</td>
								<td><?php echo number_format(($breakdown2012['net'] - $breakdown2012['nonTaxAdjustments']) / 26, 2); ?></td>
								<td><?php echo number_format(($breakdown2013['net'] - $breakdown2013['nonTaxAdjustments']) / 26, 2); ?></td>
								<td <?php echo ($breakdown2013['net'] != $breakdown2012['net']) ? 'class="' . (($breakdown2013['net'] > $breakdown2012['net']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format(($breakdown2013['net'] - $breakdown2012['net'] - ($breakdown2012['child_benefit'] - $breakdown2013['child_benefit'])) / 26, 2); ?></td>
							</tr>
							<tr class="net-row hidden">
								<td class="sub-item">Per week</td>
								<td><?php echo number_format(($breakdown2012['net'] - $breakdown2012['nonTaxAdjustments']) / 52, 2); ?></td>
								<td><?php echo number_format(($breakdown2013['net'] - $breakdown2013['nonTaxAdjustments']) / 52, 2); ?></td>
								<td <?php echo ($breakdown2013['net'] != $breakdown2012['net']) ? 'class="' . (($breakdown2013['net'] > $breakdown2012['net']) ? 'up' : 'down') . '"' : '';?>><?php echo number_format(($breakdown2013['net'] - $breakdown2012['net'] - ($breakdown2012['child_benefit'] - $breakdown2013['child_benefit'])) / 52, 2); ?></td>
							</tr>
						</table>
						<?php endif;?>
						<form method="get" action="index.php">					
							
<div class="calculator-options"><div id="basic-calc" class="switch-calculator">Basic Calculator</div> | <div id="advanced-calc" class="switch-calculator">Advanced Calculator</div></div>
							<div class="clear">
								<h2>Basic Details</h2>
								<div class="basic-calc-row">
									<div class="row<?php echo ($errors['gross']) ? ' error-row' : ''?>">
										<div class="label">Your Gross pay:</div>
										<div class="input">
											&euro;<input type="text" name="gross" id="gross" value="<?php echo $_GET['gross']; ?>" />
										</div>
										<?php if ($errors['gross']) :?>
										<div class="error">
											<?php echo $errors['gross'];?>
										</div>
										<?php endif;?>	
									</div>
									<div class='row'>
								    	<div class="label">You are:</div> 
										<div class="input">
											<select name="employment-status">
												<option value="1" <?php echo (isset($_GET['employment-status']) && $_GET['employment-status'] == 1) ? 'selected="selected"' : '';?>>a PAYE worker</option>
												<option value="2" <?php echo (isset($_GET['employment-status']) && $_GET['employment-status'] == 2) ? 'selected="selected"' : '';?>>a Public Servant</option>
												<option value="3" <?php echo ((isset($_GET['self-employed']) && $_GET['self-employed'] == 1) || (isset($_GET['employment-status']) && $_GET['employment-status'] == 3)) ? 'selected="selected"' : '';?>>Self Employed</option>
											</select>
										</div>
								    </div>
									<div class="row<?php echo ($errors['marital-status']) ? ' error-row' : ''?>">
										<div class="label">Marital Status:</div>
										<div class="input">
											<select id="marital-status" name="marital-status" onchange="javascript:changeStatus();">
												<option value="1" <?php echo (isset($_GET['marital-status']) && $_GET['marital-status'] == 1) ? 'selected="selected"' : '';?>>Single</option>
												<option value="2" <?php echo (isset($_GET['marital-status']) && $_GET['marital-status'] == 2) ? 'selected="selected"' : '';?>>Married (1 income)</option>
												<option value="3" <?php echo (isset($_GET['marital-status']) && $_GET['marital-status'] == 3) ? 'selected="selected"' : '';?>>Married (2 incomes, joint assessment)</option>
												<option value="5" <?php echo (isset($_GET['marital-status']) && $_GET['marital-status'] == 5) ? 'selected="selected"' : '';?>>Married (2 incomes, assessed as a single)</option>
												<option value="6" <?php echo (isset($_GET['marital-status']) && $_GET['marital-status'] == 6) ? 'selected="selected"' : '';?>>Married (2 incomes, seperate assessment)</option>
												<option value="4" <?php echo (isset($_GET['marital-status']) && $_GET['marital-status'] == 4) ? 'selected="selected"' : '';?>>Widowed</option>
											</select>
										</div>
										<?php if ($errors['marital-status']) :?>
										<div class="error">
											<?php echo $errors['marital-status'];?>
										</div>
										<?php endif;?>	
									</div>
									<div class="spouse-income-row <?php echo ($_GET['marital-status'] != 3) ? ' hidden' : ''?> row<?php echo ($errors['spouse-income']) ? ' error-row' : ''?>">
										<div class="label">Spouse's gross pay:</div>
										<div class="input">
											&euro;<input type="text" name="spouse-income" id="spouse-income" value="<?php echo $_GET['spouse-income']; ?>" />
										</div>
										<?php if ($errors['spouse-income']) :?>
										<div class="error">
											<?php echo $errors['spouse-income'];?>
										</div>
										<?php endif;?>	
									</div>
									<div class="spouse-income-row <?php echo ($_GET['marital-status'] != 3) ? ' hidden' : ''?> row">
										<div class="label">Your spouse is</div>
										<div class="input">
											<select name="spouse-employment-status">
												<option value="1" <?php echo (isset($_GET['spouse-employment-status']) && $_GET['spouse-employment-status'] == 1) ? 'selected="selected"' : '';?>>a PAYE worker</option>
												<option value="2" <?php echo (isset($_GET['spouse-employment-status']) && $_GET['spouse-employment-status'] == 2) ? 'selected="selected"' : '';?>>a Public Servant</option>
												<option value="3" <?php echo (isset($_GET['spouse-employment-status']) && $_GET['spouse-employment-status'] == 3) ? 'selected="selected"' : '';?>>Self Employed</option>
											</select>
										</div>
									</div>
									<div class="row<?php echo ($errors['children']) ? ' error-row' : ''?>">
										<div class="label">Children:</div>
										<div class="input"> 
											<select name="children">
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
									<div class="row<?php echo ($errors['age']) ? ' error-row' : ''?>">
										<div class="label">Age:</div>
										<div class="input"> 
											<select id="age" name="age" onchange="javascript:ageRange();">
										      <option value="29" <?php echo (isset($_GET['age']) && $_GET['age'] == 29) ? 'selected="selected"' : '';?>>18-29</option>
										      <option value="39" <?php echo (isset($_GET['age']) && $_GET['age'] == 39) ? 'selected="selected"' : '';?>>30-39</option>
										      <option value="49" <?php echo (isset($_GET['age']) && $_GET['age'] == 49) ? 'selected="selected"' : '';?>>40-49</option>
										      <option value="54" <?php echo (isset($_GET['age']) && $_GET['age'] == 54) ? 'selected="selected"' : '';?>>50-54</option>
										      <option value="59" <?php echo (isset($_GET['age']) && $_GET['age'] == 59) ? 'selected="selected"' : '';?>>55-59</option>
										      <option value="60" <?php echo (isset($_GET['age']) && $_GET['age'] == 60) ? 'selected="selected"' : '';?>>60-69</option>
										      <option value="70" <?php echo (isset($_GET['age']) && $_GET['age'] == 70) ? 'selected="selected"' : '';?>>70+</option>
										    </select>
										</div>
									    <?php if ($errors['age']) :?>
										<div class="error">
											<?php echo $errors['age'];?>
										</div>
										<?php endif;?>
									</div>
									<div id="age-credit-row" class="row<?php echo ($errors['age-credit']) ? ' error-row' : ''; if ($_GET['age'] != 60) echo ' hidden'?>">
									    <div class="label">Will you be 65 or older this year?</div> 
										<div class="input">
											<select name="age-credit">
										      <option value="0" <?php echo (isset($_GET['age-credit']) && $_GET['age-credit'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['age-credit']) && $_GET['age-credit'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
									    <?php if ($errors['age-credit']) :?>
										<div class="error">
											<?php echo $errors['age-credit'];?>
										</div>
										<?php endif;?>
								    </div>
								    <div class='row'>
								    	<div class="label">Do you have a 'full' medical card?</div> 
										<div class="input">
											<select name="medical-card">
										      <option value="0" <?php echo (isset($_GET['medical-card']) && $_GET['medical-card'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['medical-card']) && $_GET['medical-card'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row">
										<div class="label">What is your house worth:</div>
										<div class="input">
											&euro;<input type="text" name="house_value" id="house_value" value="<?php echo $_GET['house_value']; ?>" />
										</div>
										<?php if ($errors['house']) :?>
										<div class="error">
											<?php echo $errors['house'];?>
										</div>
										<?php endif;?>	
									</div>
								</div>
								<div class="advanced-calc-row <?php if (!isset($_GET['show-advanced']) || !$_GET['show-advanced']) echo 'hidden'; ?>">
									<h2>Credits & Cutoffs</h2>
									<div class='row'>
								    	<div class="label">Do you know your cutoff?</div> 
										<div class="input">
											<select name="know-cutoff" onchange="javascript:$('#cutoff-details').toggle();">
										      <option value="0" <?php echo (isset($_GET['know-cutoff']) && $_GET['know-cutoff'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['know-cutoff']) && $_GET['know-cutoff'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div id="cutoff-details" <?php echo (!$_GET['know-cutoff']) ? 'class="hidden"' : '';?>>
									    <div class="row<?php echo ($errors['own-cutoff']) ? ' error-row' : ''?>">
									    	<div class="label">Cutoff:</div> 
									    	<div class="input">
									    		&euro;<input type="text" id="own-cutoff" name="own-cutoff" value="<?php echo $_GET['own-cutoff']; ?>" />
									    	</div>
									    	<?php if ($errors['own-cutoff']) :?>
											<div class="error">
												<?php echo $errors['own-cutoff'];?>
											</div>
											<?php endif;?>
										</div>
									</div>
								    <div class='row'>
								    	<div class="label">Do you know your credits total?</div> 
										<div class="input">
											<select name="know-credits" onchange="javascript:$('#own-credits-details').toggle();">
										      <option value="0" <?php echo (isset($_GET['know-credits']) && $_GET['know-credits'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['know-credits']) && $_GET['know-credits'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div id="own-credits-details" <?php echo (!$_GET['know-credits']) ? 'class="hidden"' : '';?>>
									    <div class="row<?php echo ($errors['own-credits']) ? ' error-row' : ''?>">
									    	<div class="label">Credits:</div> 
									    	<div class="input">
									    		&euro;<input type="text" id="own-credits" name="own-credits" value="<?php echo $_GET['own-credits']; ?>" />
									    	</div>
									    	<?php if ($errors['own-credits']) :?>
											<div class="error">
												<?php echo $errors['own-credits'];?>
											</div>
											<?php endif;?>
										</div>
									</div>
									<h2>Pension</h2>
									<div class="row<?php echo ($errors['pension']) ? ' error-row' : ''?>">	
										<div class="label">Pension Contribution:</div>
										<div class="input">
											<input type="text" name="pension" id="pension" value="<?php echo $_GET['pension']; ?>" />
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
									<div class="row<?php echo ($errors['avc']) ? ' error-row' : ''?>">
										<div class="label">AVC:</div>
										<div class="input">
											<input type="text" name="avc" id="avc" value="<?php echo $_GET['avc']; ?>" />
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
									<h2>Benifit-in-Kind</h2>
									<div class="row<?php echo ($errors['company-car']) ? ' error-row' : ''?>">
										<div class="label">Do you have a company car:</div>
										<div class="input">
											<select name="company-car" onchange="javascript:$('#car-details').toggle();">
										      <option value="0" <?php echo (isset($_GET['company-car']) && $_GET['company-car'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['company-car']) && $_GET['company-car'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
									    </div>
									    <?php if ($errors['company-car']) :?>
										<div class="error">
											<?php echo $errors['company-car'];?>
										</div>
										<?php endif;?>
								    </div>
								    <div id="car-details" <?php echo (!$_GET['company-car']) ? 'class="hidden"' : '';?>>
									    <div class="row<?php echo ($errors['original-market-value']) ? ' error-row' : ''?>">
									    	<div class="label">Original market value of car:</div> 
									    	<div class="input">
									    		&euro;<input type="text" id="original-market-value" name="original-market-value" value="<?php echo $_GET['original-market-value']; ?>" />
									    	</div>
									    	<?php if ($errors['original-market-value']) :?>
											<div class="error">
												<?php echo $errors['original-market-value'];?>
											</div>
											<?php endif;?>
										</div>
										<div class="row<?php echo ($errors['business-mileage']) ? ' error-row' : ''?>">
											<div class="label">What's your business mileage (in kilometres):</div> 
											<div class="input">
												<select name="business-mileage">
											      <option value="24135" <?php echo (isset($_GET['business-mileage']) && $_GET['business-mileage'] == 24135) ? 'selected="selected"' : '';?>>24,135 or less</option>
											      <option value="32180" <?php echo (isset($_GET['business-mileage']) && $_GET['business-mileage'] == 32180) ? 'selected="selected"' : '';?>>24,136 to 32,180</option>
											      <option value="40225" <?php echo (isset($_GET['business-mileage']) && $_GET['business-mileage'] == 40225) ? 'selected="selected"' : '';?>>32,181 to 40,225</option>
											      <option value="48270" <?php echo (isset($_GET['business-mileage']) && $_GET['business-mileage'] == 48270) ? 'selected="selected"' : '';?>>40,226 to 48,270</option>
											      <option value="48271" <?php echo (isset($_GET['business-mileage']) && $_GET['business-mileage'] == 48271) ? 'selected="selected"' : '';?>>48,271+</option>
											    </select> km
										    </div>
									    	<?php if ($errors['business-mileage']) :?>
											<div class="error">
												<?php echo $errors['business-mileage'];?>
											</div>
											<?php endif;?>
										</div>
									    <div class="row<?php echo ($errors['running-cost']) ? ' error-row' : ''?>">
											<div class="label">Do you contribute to the running costs?</div>
											<div class="input">
												&euro;<input type="text" id="running-cost" name="running-cost" value="<?php echo $_GET['running-cost']; ?>" /> (per year)
											</div>
											<?php if ($errors['running-cost']) :?>
											<div class="error">
												<?php echo $errors['running-cost'];?>
											</div>
											<?php endif;?>
										</div>
									</div>
								    <div class="row<?php echo ($errors['employer-health-insurance']) ? ' error-row' : ''?>">
								    	<div class="label">Does your employer pay your heath insurance?</div> 
										<div class="input">
											<select name="employer-health-insurance" onchange="javascript:$('#heath-insurance-contribution-row').toggle();">
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
									<div id="heath-insurance-contribution-row" class="row<?php echo ($errors['heath-insurance-contribution']) ? ' error-row' : ''; echo (!$_GET['employer-health-insurance']) ? ' hidden' : '';?>">
								    	<div class="label">How much?</div> 
								    	<div class="input">
								    		&euro;<input type="text" id="heath-insurance-contribution" name="heath-insurance-contribution" value="<?php echo $_GET['heath-insurance-contribution']; ?>" />
								    	</div>
								    	<?php if ($errors['heath-insurance-contribution']) :?>
										<div class="error">
											<?php echo $errors['heath-insurance-contribution'];?>
										</div>
										<?php endif;?>
									</div>
									<h2>Tax Reliefs</h2>
								    <div class="row<?php echo ($errors['rent']) ? ' error-row' : ''?>">
								    	<div class="label">Do you pay rent?</div>
								    	<div class="input">
										    <select name="rent">
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
									<div class="row<?php echo ($errors['tuition']) ? ' error-row' : ''?>">
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
									<h2>Tax Credits</h2>
									<div class="row<?php echo ($errors['incapacitated-child']) ? ' error-row' : ''?>">
								    	<div class="label">Do you have an incapacitated child?</div>
								    	<div class="input">
										    <select name="incapacitated-child">
										      <option value="0" <?php echo (isset($_GET['incapacitated-child']) && $_GET['incapacitated-child'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['incapacitated-child']) && $_GET['incapacitated-child'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['incapacitated-child']) ? ' error-row' : ''?>">
								    	<div class="label">Do you have a dependent relative?</div>
								    	<div class="input">
										    <select name="dependent-relative" onchange="javascript:$('#dependent-relative-income-row').toggle();">
										      <option value="0" <?php echo (isset($_GET['dependent-relative']) && $_GET['dependent-relative'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['dependent-relative']) && $_GET['dependent-relative'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div id="dependent-relative-income-row" class="row<?php echo ($errors['dependent-relative-income']) ? ' error-row' : ''; echo (!$_GET['dependent-relative']) ? ' hidden' : '';?>">
								    	<div class="label">What is their income?</div> 
								    	<div class="input">
								    		&euro;<input type="text" id="dependent-relative-income" name="dependent-relative-income" value="<?php echo $_GET['heath-insurance-contribution']; ?>" />
								    	</div>
								    	<?php if ($errors['dependent-relative-income']) :?>
										<div class="error">
											<?php echo $errors['dependent-relative-income'];?>
										</div>
										<?php endif;?>
									</div>
									<div id="widow-credit-details-row" <?php echo ($_GET['marital-status'] != 4) ? 'class="hidden"' : ''; ?>>
										<div class="row<?php echo ($errors['widow-year-bereavement']) ? ' error-row' : ''?>">
											<div class="label">Widowed Person in year of bereavement:</div>
											<div class="input"> 
												<select name="widow-year-bereavement">
											      <option value="0" <?php echo (isset($_GET['widow-year-bereavement']) && $_GET['widow-year-bereavement'] == 0) ? 'selected="selected"' : '';?>>No</option>
											      <option value="1" <?php echo (isset($_GET['widow-year-bereavement']) && $_GET['widow-year-bereavement'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
											    </select>
											</div>
									    </div>
									    <div class="row<?php echo ($errors['widow-parent-bereaved']) ? ' error-row' : ''?>">
									    	<div class="label">Widowed Parent Bereaved in:</div>
									    	<div class="input">
											    <select name="widow-parent-bereaved">
											      <option value="0" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 0) ? 'selected="selected"' : '';?>>Pre 2005</option>
											      <option value="2005" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2005) ? 'selected="selected"' : '';?>>2005</option>
											      <option value="2006" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2006) ? 'selected="selected"' : '';?>>2006</option>
											      <option value="2007" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2007) ? 'selected="selected"' : '';?>>2007</option>
											      <option value="2008" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2008) ? 'selected="selected"' : '';?>>2008</option>
											      <option value="2009" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2009) ? 'selected="selected"' : '';?>>2009</option>
											      <option value="2010" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2010) ? 'selected="selected"' : '';?>>2010</option>
<option value="2011" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2010) ? 'selected="selected"' : '';?>>2011</option>
<option value="2012" <?php echo (isset($_GET['widow-parent-bereaved']) && $_GET['widow-parent-bereaved'] == 2010) ? 'selected="selected"' : '';?>>2012</option>
											    </select>
											 </div>
									    </div>
									</div>
								    <div class="row<?php echo ($errors['blind']) ? ' error-row' : ''?>">
								    	<div class="label">Are you Blind?</div>
								    	<div class="input">
										    <select name="blind">
										      <option value="0" <?php echo (isset($_GET['blind']) && $_GET['blind'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['blind']) && $_GET['blind'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['blind-spouse']) ? ' error-row' : ''?>">
								    	<div class="label">Is your spouse blind?</div>
								    	<div class="input">
										    <select name="blind-spouse">
										      <option value="0" <?php echo (isset($_GET['blind-spouse']) && $_GET['blind-spouse'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['blind-spouse']) && $_GET['blind-spouse'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['guide-dog']) ? ' error-row' : ''?>">
								    	<div class="label">Do you have a guide dog?</div>
								    	<div class="input">
										    <select name="guide-dog">
										      <option value="0" <?php echo (isset($_GET['guide-dog']) && $_GET['guide-dog'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['guide-dog']) && $_GET['guide-dog'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								    <div class="row<?php echo ($errors['tuition']) ? ' error-row' : ''?>">
								    	<div class="label">Do you employ a carer?</div>
								    	<div class="input">
										    <select name="employ-carer">
										      <option value="0" <?php echo (isset($_GET['employ-carer']) && $_GET['employ-carer'] == 0) ? 'selected="selected"' : '';?>>No</option>
										      <option value="1" <?php echo (isset($_GET['employ-carer']) && $_GET['employ-carer'] == 1) ? 'selected="selected"' : '';?>>Yes</option>
										    </select>
										</div>
								    </div>
								</div>
							</div>
							<div style="clear:both; padding-top:20px;">
								<input type="submit" name="submit" value="Calculate" />
							</div>
							<input type="hidden" id="show-advanced" name="show-advanced" value="<?php echo (isset($_GET['show-advanced']) && $_GET['show-advanced'] == 1) ? '1' : '0';?>" />
						</form>

					</div><!-- .entry-content -->
				</div><!-- #post-## -->

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$('.switch-calculator').click(function() {
		var section = $(this).attr('id');

		if (section == 'advanced-calc')
		{
			$('.advanced-calc-row').show();
			$('#show-advanced').val(1);
		}
		else
		{
			$('.advanced-calc-row').hide();
			$('#show-advanced').val(0);
		}
	});
	
	$(".fake-link").click(function() {  
		var section = $(this).attr('id');
		$("." + section + "-row").toggle();

		if (section == 'advanced-calc')
		{
			
			var setAdvanced = ($('#show-advanced').val() == 1) ? 0 : 1;
			
			$('#show-advanced').val(setAdvanced);
		}
    });
 });   


function ageRange()
{
        if ($("#age").val() >= 60)
        {
                $("#age-credit-row").show();
        }
        else
        {
                $("#age-credit-row").hide();
        }               
}

function changeStatus()
{
        if ($("#marital-status").val() == 3)
        {
                $(".spouse-income-row").show();
        }
        else
        {
                $(".spouse-income-row").hide();
        }
        
        if ($("#marital-status").val() == 4)
        {
                $("#widow-credit-details-row").show();
        }
        else
        {
                $("#widow-credit-details-row").hide();
        }       
}
</script>

<?php get_footer(); ?>
