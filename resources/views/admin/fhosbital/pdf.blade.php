
<div class="invoice-box {{config('app.locale') == 'ar' ? 'rtl' : ''}}">
<div class="app-content content">
<div class="content-wrapper">
<div class=" " >
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoice</span>
						</div>
					</div>
					



				
				
				<!-- breadcrumb -->
				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-12">
						<div class="main-content-body-invoice " id="print">
							<div class="card card-invoice">
								<div class="card-body">
									<div class="invoice-header">
										<h1 class="invoice-title">Invoice</h1>
										<div class="billed-from">
											<h6>BootstrapDash, Inc.</h6>
											<p>201 Something St., Something Town, YT 242, Country 6546<br>
											Tel No: 324 445-4544<br>
											Email: youremail@companyname.com</p>
										</div><!-- billed-from -->
									</div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
											<label class="tx-gray-600">Billed To</label>
											<div class="billed-to">
												<h6>Juan Dela Cruz</h6>
												<p>4033 Patterson Road, Staten Island, NY 10301<br>
												Tel No: 324 445-4544<br>
												Email: youremail@companyname.com</p>
											</div>
										</div>
										<div class="col-md">
											<label class="tx-gray-600">معلومات ألصيدلية </label>
											
											<p class="invoice-info-row"><span> الاسم :</span> 
                                            <span> {{$hosbital->name}}</span></p>
											<p class="invoice-info-row"><span>ألعنوان :</span>
                                             <span> {{$hosbital->cuontry->name}} - {{$hosbital->city->name}} - {{$hosbital->address}}</span></p>
											<p class="invoice-info-row"><span>رقم ألهاتف:</span> 
                                            <span> {{$hosbital->mobile}}</span></p>
										</div>
									</div>
									<div class="table-responsive mg-t-40">
										<table class="table table-invoice border text-md-nowrap mb-0">
											<thead>
												<tr>
													<th class="wd-20p">رقم</th>
													<th class="wd-40p">تاريخ الاشتراك</th>
													<th class="tx-center">قيمة ألاشتراك</th>
													<th class="tx-right"> ألمدفوع</th>
													<th class="tx-right">وقت ألدفع</th>
                                                    <th class="tx-right">تاريخ ألدفع</th>
                                                    <th class="tx-right">حالة ألدفع</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>{{$hosbital->id}}</td>
													<td class="tx-12">{{$hosbital->sup_date}}</td>
													<td class="tx-center">{{$hosbital->sup_price}}</td>
													<td class="tx-right">{{$hosbital->suppay_price}}</td>
                                                   
													<td class="tx-right">{{$hosbital->pay_time}}</td>
                                                    <td class="tx-right">{{$hosbital->sup_date}}</td>
                                                    <td >
                                                            @if ($hosbital -> status == 0)
                                                               <span class="badge badge-pill badge-success">{{$hosbital -> getStatus()}}</span>
                                                               @else <span class="badge badge-pill badge-danger">{{$hosbital -> getStatus()}}</span>@endif
                                                        </td>
												</tr>
			
											</tbody>
										</table>
									</div>
									
								</div>
							</div>
						</div>
					</div><!-- COL-END -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
        </div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		</div>
	

 



<script >

    
    window.print();
    


</script>


