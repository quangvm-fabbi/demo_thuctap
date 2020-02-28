@if ($paginator->hasPages())
         <div class="shop_pagination">
                                    <div class="row align-items-center">   
                                        <div class="col-lg-6 offset-lg-2 col-md-6 col-sm-6">
                                            <div class="page_list_clearfix text-center">
                                                <ul>
          
            @if ($paginator->onFirstPage())
                <li class="prev" aria-disabled="true" aria-label="@lang('pagination.previous')"><a href="#"><i class="zmdi zmdi-chevron-left"></i> Previous</a></li>
            @else
                <li class="prev"><a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')"><i class="zmdi zmdi-chevron-left"></i> Previous</a></li>
            @endif

            
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                         
                            <li class="current_page"><a href="#">{{ $page }}</a></li>
                        @else
                          
                            <li ><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

          
            @if ($paginator->hasMorePages())
                    <li class="next"><a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')"> Next <i class="zmdi zmdi-chevron-right"></i></a></li>
            @else
                <li class="next" aria-label="@lang('pagination.next')"><a href="#"> Next <i class="zmdi zmdi-chevron-right"></i></a></li>
            @endif
        </ul>
     </div>         
                                        </div>
                                    </div>          
                                </div>
@endif
