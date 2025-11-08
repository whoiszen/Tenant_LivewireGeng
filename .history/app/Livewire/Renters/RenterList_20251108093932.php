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
    private $roomImages = ['pic1.jpeg', 'pic2.jpeg', 'pic3.jpeg', 'pic4.jpeg'];

    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    public function updatedFilterType()
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
            ->when($this->filterType !== 'all', function ($q) {
                $q->where('capacity', $this->filterType === 'shared' ? '>' : '=', 1);
            });

        $rooms = $query->paginate(12); // 12 rooms per page

        return view('livewire.renters.renter-list', compact('rooms'));
    }
}
