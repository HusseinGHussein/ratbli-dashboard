@forelse ($orderItems as $orderItem)
    <tr>
        <td>{{ $orderItem->id }}</td>
        <td>
            <a href="javascript:void(0)" class="showProductInfoModal" data-id="{{ $orderItem->product->id }}">
                {{ $orderItem->product->name }}
            </a>
        </td>
        <td>{{ $orderItem->product->provider->user_name }}</td>
        <td>{{ $orderItem->amount }}</td>
        <td>{{ $orderItem->date }}</td>
        <td>{{ (getStringBetween($orderItem->notes, '<', '>')) ? getStringBetween($orderItem->notes, '<', '>') : $orderItem->time }}</td>
        <td>
            <span class="label label-lg font-weight-bold  label-light-{{ $orderItem->orderStatus->class }} label-inline">{{ $orderItem->orderStatus->name }}</span>
        </td>
        <td>{{ $orderItem->notes }}</td>
        <td>
            <button type="button" class="btn btn-sm btn-clean trackOrder" data-id="{{ $orderItem->id }}" title="تتبع الطلب"><i class="flaticon-list"></i></button>
            <a href="https://www.google.com/maps/place?q={{ $orderItem->order_lat }},{{ $orderItem->order_long }}" class="btn btn-sm btn-clean" target="_blank" title="العنوان علي الخريطة"><i class="flaticon-placeholder"></i></a>
            <span class="dropdown">							
                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" title="تغيير حالة الطلب">                                
                    <i class="la la-cog"></i>                            
                </a>						  	
                <div class="dropdown-menu dropdown-menu-right">						    	
                    <a class="dropdown-item acceptOrder" href="javascript:void(0)" data-id="{{ $orderItem->id }}"><i class="la la-check-square mr-2"></i> قبول</a>						    	
                    <a class="dropdown-item refuseOrder" href="javascript:void(0)" data-id="{{ $orderItem->id }}"><i class="flaticon-cancel mr-2"></i> رفض</a>						    	
                    <a class="dropdown-item inWaitingOrder" href="javascript:void(0)" data-id="{{ $orderItem->id }}"><i class="la la-circle-o-notch mr-2"></i> قيد الانتظار</a>						    	
                    <a class="dropdown-item prepareOrder" href="javascript:void(0)" data-id="{{ $orderItem->id }}"><i class="flaticon-clock-1 mr-2"></i> جاري التحضير</a>						    							    	
                    <a class="dropdown-item readyForDeliveryOrder" href="javascript:void(0)" data-id="{{ $orderItem->id }}"><i class="flaticon-truck mr-2"></i> خارج للتوصيل</a>	
                    <a class="dropdown-item completeOrder" href="javascript:void(0)" data-id="{{ $orderItem->id }}"><i class="flaticon-like mr-2"></i> مكتمل</a>						  	
                </div>						
            </span>
            <span class="dropdown">							
                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" title="Automate operation">                                
                    <i class="flaticon-whatsapp"></i>                            
                </a>						  	
                <div class="dropdown-menu dropdown-menu-right">						    	
                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ fixPhoneFormat($orderItem->product->provider->phone) }}&text={{ sendProviderSMS($orderItem) }}" target="_blank"><i class="flaticon-whatsapp mr-2"></i>إرسال لمزود الخدمة</a>						    						  	
                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ fixPhoneFormat($orderItem->order->user->phone) }}&text={{ sendClientSMS($orderItem) }}" target="_blank"><i class="flaticon-whatsapp mr-2"></i>إرسال للعميل</a>						    						  	
                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ fixPhoneFormat('966593927000') }}&text={{ sendDeliverySMS($orderItem) }}" target="_blank"><i class="flaticon-whatsapp mr-2"></i>إرسال لمندوب التوصيل (عربي)</a>						    						  	
                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone={{ fixPhoneFormat('966593927000') }}&text={{ sendDeliverySMS($orderItem, 'en') }}" target="_blank"><i class="flaticon-whatsapp mr-2"></i>إرسال لمندوب التوصيل (إنجليزي)</a>						    						  	
                </div>						
            </span>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="9">لا توجد أي طلبات</td>
    </tr>
@endforelse