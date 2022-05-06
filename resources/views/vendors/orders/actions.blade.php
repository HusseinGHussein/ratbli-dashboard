<button type="button" class="btn btn-sm btn-clean trackOrder" data-id="{{ $row->id }}" title="تتبع الطلب"><i class="flaticon-list"></i></button>
<a href="https://www.google.com/maps/place?q={{ $row->order_lat }},{{ $row->order_long }}" class="btn btn-sm btn-clean" target="_blank" title="العنوان علي الخريطة"><i class="flaticon-placeholder"></i></a>
<span class="dropdown">							
    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md"  data-toggle="dropdown" title="تغيير حالة الطلب">                                
        <i class="la la-cog"></i>                            
    </a>						  	
    <div class="dropdown-menu dropdown-menu-right">						    	
        <a class="dropdown-item acceptOrder" href="javascript:void(0)" data-id="{{ $row->id }}"><i class="la la-check-square mr-2"></i> قبول</a>						    	
        <a class="dropdown-item refuseOrder" href="javascript:void(0)" data-id="{{ $row->id }}"><i class="flaticon-cancel mr-2"></i> رفض</a>						    	
        <a class="dropdown-item inWaitingOrder" href="javascript:void(0)" data-id="{{ $row->id }}"><i class="la la-circle-o-notch mr-2"></i> قيد الانتظار</a>						    	
        <a class="dropdown-item prepareOrder" href="javascript:void(0)" data-id="{{ $row->id }}"><i class="flaticon-clock-1 mr-2"></i> جاري التحضير</a>						    							    	
        <a class="dropdown-item readyForDeliveryOrder" href="javascript:void(0)" data-id="{{ $row->id }}"><i class="flaticon-truck mr-2"></i> خارج للتوصيل</a>	
        <a class="dropdown-item completeOrder" href="javascript:void(0)" data-id="{{ $row->id }}"><i class="flaticon-like mr-2"></i> مكتمل</a>						  	
    </div>						
</span>