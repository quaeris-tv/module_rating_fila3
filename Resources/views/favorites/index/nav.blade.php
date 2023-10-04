<div class="col-lg-3 pt-3">
    <form class="pe-xl-3" action="favorites">
        {{-- <div class="mb-4">
            <label class="form-label" for="form_search">Keyword</label>
            <div class="input-label-absolute input-label-absolute-right">
                <div class="label-absolute"><i class="fa fa-search"></i></div>
                <input class="form-control pe-4" type="search" name="search" placeholder="Keywords" id="form_search">
            </div>
        </div> --}}

        <div class="mb-4">
            <x-input.group type="text" name="q" />
        </div>

        <div class="mb-4">

            {{-- <x-input.grouptype="select.multiple"name="media_type":options="$_panel->getMediaTypeList()"id="media_type"/> --}}

            <label class="form-label">Inizia con</label>
            <x-input type="text" name="start_with" />

            <label class="form-label">Escludi parola</label>
            <x-input type="text" name="without" />

        </div>
        <div class="mb-4">
            <label class="form-label" for="form_category">Ordina per</label>

            @php
                $orders = ['desc' => 'desc', 'asc' => 'asc'];
            @endphp
            <x-input type="select" name="order_by" :options="$orders" id="order_by" />


            {{-- <select class="selectpicker form-control" name="category" id="form_category" multiple
                data-style="btn-selectpicker" data-selected-text-format="count &gt; 1" data-none-selected-text="">
                <option value="category_0">Hipster </option>
                <option value="category_1">Music club </option>
                <option value="category_2">Bar </option>
                <option value="category_3">Pub </option>
                <option value="category_4">Deli </option>
                <option value="category_5">Bistro </option>
            </select> --}}

        </div>
        <div class="mb-4">
            {{-- <label class="form-label">Tag</label>
            <ul class="list-unstyled mb-0">
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_0" name="type[]">
                        <label class="form-check-label" for="type_0">Hipster</label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_1" name="type[]">
                        <label class="form-check-label" for="type_1">Music club</label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_2" name="type[]">
                        <label class="form-check-label" for="type_2">Bar</label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_3" name="type[]">
                        <label class="form-check-label" for="type_3">Pub</label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_4" name="type[]">
                        <label class="form-check-label" for="type_4">Deli</label>
                    </div>
                </li>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="type_5" name="type[]">
                        <label class="form-check-label" for="type_5">Bistro</label>
                    </div>
                </li>
            </ul> --}}


            {{-- <x-input.grouptype="select"name="channel":options="$_panel->getChannelsList()"/> --}}



        </div>
        {{-- <div class="pb-4">
            <div class="collapse" id="moreFilters">
                <div class="mb-4">
                    <label class="form-label">Cuisine</label>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cuisine_0" name="cuisine[]">
                                <label class="form-check-label" for="cuisine_0">Fusion</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cuisine_1" name="cuisine[]">
                                <label class="form-check-label" for="cuisine_1">Indian</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cuisine_2" name="cuisine[]">
                                <label class="form-check-label" for="cuisine_2">French</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cuisine_3" name="cuisine[]">
                                <label class="form-check-label" for="cuisine_3">American</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cuisine_4" name="cuisine[]">
                                <label class="form-check-label" for="cuisine_4">Mexican</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cuisine_5" name="cuisine[]">
                                <label class="form-check-label" for="cuisine_5">Other</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <label class="form-label">Price</label>
                    <div class="text-primary" id="slider-snap"></div>
                    <div class="nouislider-values">
                        <div class="min">From $<span id="slider-snap-value-from"></span></div>
                        <div class="max">To $<span id="slider-snap-value-to"></span></div>
                    </div>
                    <input type="hidden" name="pricefrom" id="slider-snap-input-from" value="40">
                    <input type="hidden" name="priceto" id="slider-snap-input-to" value="110">
                </div>
                <div class="mb-4">
                    <label class="form-label">Vegetarians</label>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="vegetarians_0" name="vegetarians">
                                <label class="form-check-label" for="vegetarians_0">All</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="vegetarians_1" name="vegetarians">
                                <label class="form-check-label" for="vegetarians_1">Vegetarian only</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-4">
                <button class="btn btn-link btn-collapse ps-0 text-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#moreFilters" aria-expanded="false" aria-controls="moreFilters"
                    data-expanded-text="Less filters" data-collapsed-text="More filters">More filters</button>
            </div>
            <div class="mb-4">
                <button class="btn btn-primary" type="submit"> <i class="fas fa-filter me-1"></i>Filter
                </button>
            </div>
        </div> --}}
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
        </button>
    </form>
</div>
