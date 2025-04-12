<div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <form wire:submit.prevent="createBooking">
        <div class="space-y-4">
            <input type="text" wire:model="name" placeholder="Name" class="w-full border rounded p-2" required>
            <input type="email" wire:model="email" placeholder="Email" class="w-full border rounded p-2" required>
            <input type="text" wire:model="address" placeholder="Address" class="w-full border rounded p-2" required>

            <select wire:model="type_of_cleaning" class="w-full border rounded p-2" required>
                <option value="">-- Select Type of Cleaning --</option>
                <option value="standard">Standard</option>
                <option value="deep">Deep Cleaning</option>
                <option value="move-out">Move-Out</option>
            </select>

            <input type="date" wire:model="date" class="w-full border rounded p-2" required>
            <input type="time" wire:model="time" class="w-full border rounded p-2" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Book Now
            </button>
        </div>
    </form>
</div>
