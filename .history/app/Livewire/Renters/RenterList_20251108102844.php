<?php

namespace App\Livewire\Renters;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class RenterList extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $filterType = 'all'; // 'all', 'shared', 'private'
    public $favorites = []; // Track favorite rooms
    public $location = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $capacity = '';
    public $selectedAddons = []; // Array of selected add-ons like ['wifi', 'aircon']
    private $roomImages = ['pic1.jpeg', 'pic2.jpeg', 'pic3.jpeg', 'pic4.jpeg'];

    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    public function updatedFilterType()
    {
        $this->resetPage();
    }

    public function updatedLocation()
    {
        $this->resetPage();
    }

    public function updatedMinPrice()
    {
        $this->resetPage();
    }

    public function updatedMaxPrice()
    {
        $this->resetPage();
    }

    public function updatedCapacity()
    {
        $this->resetPage();
    }

    public function updatedSelectedAddons()
    {
        $this->resetPage();
    }

    public function toggleFavorite($roomId)
    {
        if (in_array($roomId, $this->favorites)) {
            $this->favorites = array_diff($this->favorites, [$roomId]);
        } else {
            $this->favorites[] = $roomId;
        }
    }

    public function getFilterLabel()
    {
        return match($this->filterType) {
            'shared' => 'Shared Rooms',
            'private' => 'Private Rooms',
            default => 'All Rooms'
        };
    }

    public function getRoomImage($index)
    {
        return $this->roomImages[$index % count($this->roomImages)];
    }

    public function render()
    {
        $query = Room::with('renter')
            ->when($this->searchQuery, function ($q) {
                $q->where('room_number', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('price', 'like', '%' . $this->searchQuery . '%');
            })
            ->when($this->location, function ($q) {
                $q->where('room_number', 'like', '%' . $this->location . '%');
            })
            ->when($this->minPrice, function ($q) {
                $q->where('price', '>=', $this->minPrice);
            })
            ->when($this->maxPrice, function ($q) {
                $q->where('price', '<=', $this->maxPrice);
            })
            ->when($this->capacity, function ($q) {
                $q->where('capacity', $this->capacity);
            })
            ->when($this->filterType !== 'all', function ($q) {
                $q->where('capacity', $this->filterType === 'shared' ? '>' : '=', 1);
            });

        // For add-ons, since not directly linked, we'll filter based on capacity for now
        // Assuming shared rooms have WiFi, private have Aircon, etc.
        if (!empty($this->selectedAddons)) {
            $query->where(function ($q) {
                foreach ($this->selectedAddons as $addon) {
                    if ($addon === 'wifi') {
                        $q->orWhere('capacity', '>', 1); // Shared rooms have WiFi
                    } elseif ($addon === 'aircon') {
                        $q->orWhere('capacity', '=', 1); // Private rooms have Aircon
                    }
                }
            });
        }

        $rooms = $query->paginate(12); // 12 rooms per page

        return view('livewire.renters.renter-list', compact('rooms'));
    }
}
