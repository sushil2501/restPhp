<?php 
use app\assets\ManageMerchantAsset;
use app\enums\Util;

ManageMerchantAsset::register($this);
?>

<div class="col-xs-12">
	<h2 class="mainHeading">Merchant List</h2>
	<div>
		<ul id="summery_ul" class="ulmerchantdetail" style="background-color: #fbfbfb">
			<li>Business Name</li>
			<li>Business Email</li>
			<li>Business Contact</li>
			<li>Business Category</li>
			<li>City</li>
			<li>State</li>
			<li>Action</li>
		</ul>
		<div class="responsive-version">
			<?php if (! isset ( $merchantList [0]->successMessage ) && !empty($merchantList)) {
				foreach ( $merchantList as $merchant ) {?>
					<ul id="ul-<?= $merchant->id ?>" class="ulmerchantdetail">
						<li>Business Name</li>
						<li><?= $merchant->businessName?></li>
						<li>Business Email</li>
						<li><?= $merchant->businessContactEmail?></li>
						<li>Business Contact</li>
						<li><?= $merchant->businessContactPhone?></li>
						<li>Business Category</li>
						<li><?= isset($categoryArray[$merchant->businessCategories])?$categoryArray[$merchant->businessCategories]:'-'?></li>
						<li>City</li>
						<li><?= $merchant->city?></li>
						<li>State</li>
						<li><?= $merchant->state?></li>
						<li>Action</li>
						<li>
							<a href="<?= Util::generateUrl().'merchants/add?id='.$merchant->id?>" class="btn-activate">
								Activate
							</a> 
							<a href="javascript:void(0);" class="btn-remove" onclick="removeTempMerchant('<?= $merchant->id?>')">
								Remove
							</a>
							<input type="hidden" value="<?= Util::generateUrl().'merchants/remove'?>" id="removeUrl">
						</li>
					</ul>
				<?php }
			}else{?>
				<ul class="ulmerchantdetailNotFound">
					<li>No Merchant Requests</li>
				</ul>
			<?php }?>
		</div>
	</div>
</div>