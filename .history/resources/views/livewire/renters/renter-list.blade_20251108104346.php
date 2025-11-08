<div class="container-fluid py-5">
    <!-- Header with Hamburger Menu -->
    <div class="row justify-content-center mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Hamburger Button for Mobile -->
                <button class="btn btn-outline-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterSidebar" aria-controls="filterSidebar">
                    <svg class="bi" width="20" height="20" fill="currentColor">
                        <use xlink:href="#hamburger"/>
                    </svg>
                </button>

                <!-- Title and Search -->
                <div class="d-flex justify-content-center align-items-center gap-4 flex-grow-1">
                    <h2 class="display-5 fw-semibold text-dark mb-0">Available Rooms</h2>
                    <div class="input-group" style="width: 300px;">
                        <span class="input-group-text" id="search-addon">
                            <svg class="bi" width="16" height="16" fill="currentColor">
                                <use xlink:href="#search"/>
                            </svg>
                        </span>
                        <input wire:model.live="searchQuery" type="search" class="form-control" placeholder="Search rooms..." aria-label="Search rooms" aria-describedby="search-addon">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar Filters (Desktop) -->
        <div class="col-md-3 mb-4 d-none d-md-block">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <svg class="bi me-2" width="20" height="20" fill="currentColor">
                            <use xlink:href="#filter"/>
                        </svg>
                        Filters
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Location Filter -->
                    <div class="mb-3">
                        <label for="location" class="form-label fw-semibold">
                            <svg class="bi me-2" width="16" height="16" fill="currentColor">
                                <use xlink:href="#map"/>
                            </svg>
                            Location
                        </label>
                        <input wire:model.live="location" type="text" class="form-control" id="location" placeholder="Enter location...">
                    </div>

                    <!-- Price Range Filter -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <svg class="bi me-2" width="16" height="16" fill="currentColor">
                                <use xlink:href="#currency-dollar"/>
                            </svg>
                            Price Range
                        </label>
                        <div class="row g-2">
                            <div class="col-6">
                                <input wire:model.live="minPrice" type="number" class="form-control" placeholder="Min" min="0">
                            </div>
                            <div class="col-6">
                                <input wire:model.live="maxPrice" type="number" class="form-control" placeholder="Max" min="0">
                            </div>
                        </div>
                    </div>

                    <!-- Capacity Filter -->
                    <div class="mb-3">
                        <label for="capacity" class="form-label fw-semibold">
                            <svg class="bi me-2" width="16" height="16" fill="currentColor">
                                <use xlink:href="#people"/>
                            </svg>
                            Capacity
                        </label>
                        <select wire:model.live="capacity" class="form-select" id="capacity">
                            <option value="">Any</option>
                            <option value="1">1 Person</option>
                            <option value="2">2 Persons</option>
                            <option value="3">3 Persons</option>
                            <option value="4">4 Persons</option>
                            <option value="5">5 Persons</option>
                            <option value="6">6 Persons</option>
                        </select>
                    </div>

                    <!-- Add-ons Filter -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <svg class="bi me-2" width="16" height="16" fill="currentColor">
                                <use xlink:href="#plus-circle"/>
                            </svg>
                            Add-ons
                        </label>
                        <div class="form-check">
                            <input wire:model.live="selectedAddons" class="form-check-input" type="checkbox" value="wifi" id="wifi">
                            <label class="form-check-label" for="wifi">
                                <svg class="bi me-1" width="14" height="14" fill="currentColor">
                                    <use xlink:href="#wifi"/>
                                </svg>
                                WiFi
                            </label>
                        </div>
                        <div class="form-check">
                            <input wire:model.live="selectedAddons" class="form-check-input" type="checkbox" value="aircon" id="aircon">
                            <label class="form-check-label" for="aircon">
                                <svg class="bi me-1" width="14" height="14" fill="currentColor">
                                    <use xlink:href="#snow"/>
                                </svg>
                                Air Conditioning
                            </label>
                        </div>
                    </div>

                    <!-- Clear Filters Button -->
                    <button wire:click="$set('location', ''); $set('minPrice', ''); $set('maxPrice', ''); $set('capacity', ''); $set('selectedAddons', [])" class="btn btn-outline-secondary w-100">
                        <svg class="bi me-2" width="16" height="16" fill="currentColor">
                            <use xlink:href="#arrow-counterclockwise"/>
                        </svg>
                        Clear Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Offcanvas Sidebar for Mobile -->
        <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="filterSidebar" aria-labelledby="filterSidebarLabel">
            <div class="offcanvas-header bg-primary text-white">
                <h5 class="offcanvas-title" id="filterSidebarLabel">
                    <svg class="bi me-2" width="20" height="20" fill="currentColor">
                        <use xlink:href="#filter"/>
                    </svg>
                    Filters
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Location Filter -->
                <div class="mb-3">
                    <label for="location-mobile" class="form-label fw-semibold">
                        <svg class="bi me-2" width="16" height="16" fill="currentColor">
                            <use xlink:href="#map"/>
                        </svg>
                        Location
                    </label>
                    <input wire:model.live="location" type="text" class="form-control" id="location-mobile" placeholder="Enter location...">
                </div>

                <!-- Price Range Filter -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <svg class="bi me-2" width="16" height="16" fill="currentColor">
                            <use xlink:href="#currency-dollar"/>
                        </svg>
                        Price Range
                    </label>
                    <div class="row g-2">
                        <div class="col-6">
                            <input wire:model.live="minPrice" type="number" class="form-control" placeholder="Min" min="0">
                        </div>
                        <div class="col-6">
                            <input wire:model.live="maxPrice" type="number" class="form-control" placeholder="Max" min="0">
                        </div>
                    </div>
                </div>

                <!-- Capacity Filter -->
                <div class="mb-3">
                    <label for="capacity-mobile" class="form-label fw-semibold">
                        <svg class="bi me-2" width="16" height="16" fill="currentColor">
                            <use xlink:href="#people"/>
                        </svg>
                        Capacity
                    </label>
                    <select wire:model.live="capacity" class="form-select" id="capacity-mobile">
                        <option value="">Any</option>
                        <option value="1">1 Person</option>
                        <option value="2">2 Persons</option>
                        <option value="3">3 Persons</option>
                        <option value="4">4 Persons</option>
                        <option value="5">5 Persons</option>
                        <option value="6">6 Persons</option>
                    </select>
                </div>

                <!-- Add-ons Filter -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <svg class="bi me-2" width="16" height="16" fill="currentColor">
                            <use xlink:href="#plus-circle"/>
                        </svg>
                        Add-ons
                    </label>
                    <div class="form-check">
                        <input wire:model.live="selectedAddons" class="form-check-input" type="checkbox" value="wifi" id="wifi-mobile">
                        <label class="form-check-label" for="wifi-mobile">
                            <svg class="bi me-1" width="14" height="14" fill="currentColor">
                                <use xlink:href="#wifi"/>
                            </svg>
                            WiFi
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:model.live="selectedAddons" class="form-check-input" type="checkbox" value="aircon" id="aircon-mobile">
                        <label class="form-check-label" for="aircon-mobile">
                            <svg class="bi me-1" width="14" height="14" fill="currentColor">
                                <use xlink:href="#snow"/>
                            </svg>
                            Air Conditioning
                        </label>
                    </div>
                </div>

                <!-- Clear Filters Button -->
                <button wire:click="$set('location', ''); $set('minPrice', ''); $set('maxPrice', ''); $set('capacity', ''); $set('selectedAddons', [])" class="btn btn-outline-secondary w-100">
                    <svg class="bi me-2" width="16" height="16" fill="currentColor">
                        <use xlink:href="#arrow-counterclockwise"/>
                    </svg>
                    Clear Filters
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Filter State Indicator -->
            @if($filterType !== 'all')
                <div class="text-center mb-3">
                    <span class="badge bg-primary fs-6 px-3 py-2">Showing {{ $this->getFilterLabel() }}</span>
                </div>
            @endif

            <!-- Filter Tabs -->
            <ul class="nav nav-tabs justify-content-center mb-4" id="roomFilterTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button wire:click="$set('filterType', 'all')" class="nav-link {{ $filterType === 'all' ? 'active' : '' }}" id="all-tab" type="button" role="tab" aria-controls="all" aria-selected="{{ $filterType === 'all' ? 'true' : 'false' }}">All Rooms</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button wire:click="$set('filterType', 'shared')" class="nav-link {{ $filterType === 'shared' ? 'active' : '' }}" id="shared-tab" type="button" role="tab" aria-controls="shared" aria-selected="{{ $filterType === 'shared' ? 'true' : 'false' }}">Shared</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button wire:click="$set('filterType', 'private')" class="nav-link {{ $filterType === 'private' ? 'active' : '' }}" id="private-tab" type="button" role="tab" aria-controls="private" aria-selected="{{ $filterType === 'private' ? 'true' : 'false' }}">Private</button>
                </li>
            </ul>

            <!-- Room Grid -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @foreach($rooms as $room)
                <div class="col">
                    <div class="card h-100 shadow-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <!-- Room Image -->
                        <div class="position-relative">
                            <img src="{{ asset('images/rooms/' . $this->getRoomImage($loop->index)) }}"
                                 class="card-img-top" alt="Room {{ $room->room_number }}" style="height: 200px; object-fit: cover;">
                            <button wire:click="toggleFavorite({{ $room->id }})"
                                    class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle transition-all duration-200 {{ in_array($room->id, $favorites) ? 'text-danger' : 'text-muted' }} hover:scale-110">
                                <svg class="bi" width="16" height="16" fill="{{ in_array($room->id, $favorites) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2">
                                    <use xlink:href="#heart"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Room Details -->
                        <div class="card-body d-flex flex-column" style="min-height: 220px;">
                            <!-- Room Name and Rating -->
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-2 fw-bold">Room {{ $room->room_number }}</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center me-3">
                                            <svg class="bi text-warning me-1" width="16" height="16" fill="currentColor">
                                                <use xlink:href="#star-fill"/>
                                            </svg>
                                            <span class="fw-semibold text-dark">4.7</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Prominent Price -->
                            <div class="mb-3">
                                <div class="d-flex align-items-baseline">
                                    <span class="display-6 fw-bold text-primary me-2">₱{{ number_format($room->price, 0) }}</span>
                                    <span class="text-muted fw-medium">per month</span>
                                </div>
                                <small class="text-muted">Capacity: {{ $room->capacity }}</small>
                            </div>

                            <!-- Amenities -->
                            <div class="mb-3">
                                <span class="badge bg-light text-dark me-1 border">{{ $room->capacity > 1 ? 'Shared Room' : 'Private Room' }}</span>
                                <span class="badge bg-light text-dark me-1 border">WiFi</span>
                                <span class="badge bg-light text-dark border">Air Conditioning</span>
                            </div>

                            <!-- Action Button -->
                            <button class="btn btn-primary w-100 mt-auto fw-semibold">View Details</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($rooms->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $rooms->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Custom CSS for hover effects -->
    <style>
        .transition-all {
            transition: all 0.3s ease;
        }
        .duration-300 {
            transition-duration: 300ms;
        }
        .duration-200 {
            transition-duration: 200ms;
        }
        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }
        .hover\:-translate-y-1:hover {
            transform: translateY(-4px);
        }
        .hover\:scale-110:hover {
            transform: scale(1.1);
        }
        .text-danger {
            color: #dc3545 !important;
        }
    </style>

    <!-- Bootstrap Icons SVG symbols for icons -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </symbol>
        <symbol id="heart" viewBox="0 0 16 16">
            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </symbol>
        <symbol id="star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
        </symbol>
        <symbol id="hamburger" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </symbol>
        <symbol id="filter" viewBox="0 0 16 16">
            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zM2.5 2v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
        </symbol>
        <symbol id="map" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
        </symbol>
        <symbol id="currency-dollar" viewBox="0 0 16 16">
            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-2.355.22-3.671 1.256-3.671 2.844 0 1.593.957 2.51 2.879 2.985l.722.187v3.263c-1.395-.34-2.107-1.036-2.293-1.97H1.233c.24 1.48 1.323 2.48 3.14 2.754V15H4v-4.219z"/>
            <path d="M8.5 8.653V3.563h.543l.271.684c.879.43 1.723 1.05 1.773 1.734.096.807-.665 1.3-1.792 1.297H8.5z"/>
            <path d="M7.329 12.224c-.917-.663-1.408-1.672-1.408-2.787 0-.912.525-1.74 1.44-2.172V3.687c-.764-.194-1.44-.76-1.44-1.472 0-.85.778-1.51 1.783-1.51.822 0 1.5.509 1.5 1.19 0 .812-.739 1.486-1.64 1.487v4.216c.716.195 1.288.688 1.288 1.324 0 .77-.637 1.3-1.599 1.3-.822 0-1.5-.573-1.5-1.355 0-.546.349-.87.836-.986V12.22c-.724.115-1.329.54-1.329 1.085 0 .601.325.966.745 1.166z"/>
        </symbol>
        <symbol id="people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.509 5.509 0 0 0 4 9c-1.015 0-1.79.66-2.17 1.336l.47.242c.25-.47.82-.84 1.7-.84.566 0 1.06.27 1.44.76.276.347.47.762.47 1.194 0 .019-.001.037-.003.056l-.002.002A.261.261 0 0 1 5 13h-.216c.419-.374.69-.962.69-1.546 0-.632-.195-1.24-.508-1.612Z"/>
            <path d="M16 14c0 1 1 1 1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C13.516 10.68 12.535 10 11 10c-1.52 0-2.505.68-3.168 1.332-.678.678-.83 1.418-.832 1.664h5Z"/>
            <path d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1h-1.5v1.5a.5.5 0 0 1-1 0V8H12a.5.5 0 0 0 0 1h1.5V5a.5.5 0 0 1 .5-.5Z"/>
        </symbol>
        <symbol id="plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 1 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </symbol>
        <symbol id="wifi" viewBox="0 0 16 16">
            <path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z"/>
            <path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.716-.286.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.611-.091l.015-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.44.468-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z"/>
        </symbol>
        <symbol id="snow" viewBox="0 0 16 16">
            <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 5.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646.237-.883a.5.5 0 1 1 .966.258L3.401 5.64 7 3.267V.5a.5.5 0 0 1 1 0v2.768l3.599 2.07-.496-1.853a.5.5 0 1 1 .966.26l.237.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 0 1-.26.966l-1.848-.495L9 8l3.4-1.963 1.85-.495a.5.5 0 0 1 .258.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646-.237.883a.5.5 0 1 1-.966-.258l.495 1.85-3.4-1.963v3.927l1.293 1.293a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
            <path d="M7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 5.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646.237-.883a.5.5 0 1 1 .966.258L3.401 5.64 7 3.267V.5a.5.5 0 0 1 1 0v2.768l3.599 2.07-.496-1.853a.5.5 0 1 1 .966.26l.237.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 0 1-.26.966l-1.848-.495L9 8l3.4-1.963 1.85-.495a.5.5 0 0 1 .258.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646-.237.883a.5.5 0 0 1-.966-.258l.495 1.85-3.4-1.963v3.927l1.293 1.293a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
        </symbol>
        <symbol id="arrow-counterclockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
        </symbol>
    </svg>
</div>
