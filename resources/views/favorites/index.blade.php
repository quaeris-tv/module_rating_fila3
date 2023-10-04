@extends('pub_theme::layouts.app')
@section('content')
    <br /><br />
    <div class="container-fluid py-5 px-lg-5 ">
        <div class="row border-bottom mb-4">
            <div class="col-12">
                <h1 class="display-4 fw-bold text-serif mb-4">{{ __($mod_trad . '.' . $_panel_name) }}</h1>
            </div>
        </div>
        <div class="row">
            {!! $_panel->indexNav() !!}

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center flex-column flex-md-row mb-4">
                    <div class="me-3">
                        <p class="mb-3 mb-md-0"><strong>{{ $rows->total() }}</strong> records</p>
                    </div>
                    {{-- <div>
                    <label class="form-label me-2" for="form_sort">Sort by</label>
                    <select class="selectpicker" name="sort" id="form_sort" data-style="btn-selectpicker" title="">
                        <option value="sortBy_0">Most popular </option>
                        <option value="sortBy_1">Recommended </option>
                        <option value="sortBy_2">Newest </option>
                        <option value="sortBy_3">Oldest </option>
                        <option value="sortBy_4">Closest </option>
                    </select>
                </div> --}}
                </div>
                <div class="row">
                    @foreach ($rows as $favorite)
                        @php($row = $favorite->linkable)
                        {{-- <x-card.panel :panel="$_panel->newPanel($media)" />
                        <x-card type="rss" :model="$media" /> --}}
                        <div class="col-sm-6 col-xl-4 mb-5">
                            {{-- <x-card type="result" :model="$row">
                                <x-slot name="title">{{ $row->title }} </x-slot>
                                <x-slot name="url">{{ Panel::make()->get($row)->setName('presses')->url() }}</x-slot>
                                <x-slot name="img_src">{{ $row->poster_path }}</x-slot>
                                <x-slot name="avatar">{{ optional($row->channel)->logo }}</x-slot>
                                <x-slot name="category">{{ $row->media_type }}</x-slot>
                                <x-slot name="q">{{ request('q', '') }}</x-slot>
                                <x-slot name="txt">{{ $row->txt }}</x-slot>
                            </x-card> --}}
                            <x-card.press.clip :clip="$row" type="social">

                            </x-card.press.clip>

                            {{-- <livewire:card.result.panel:panel="$_panel->newPanel($media)":q="request('q','')"/> --}}
                            {{-- <livewire:card.result.model :panel="$_panel->newPanel($media)" :q="request('q')" />
                            <livewire:card.result :panel="$_panel->newPanel($media)" :q="request('q')" >
                            <x-slot name="img_src">{{ $media->poster_path }}</x-slot> --}}
                        </div>
                    @endforeach
                </div>
                <x-pagination :rows="$rows" />
            </div>
        </div>
    </div>
@endsection
