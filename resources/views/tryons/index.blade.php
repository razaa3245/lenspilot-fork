<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try-On Records</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div x-data="tryOnApp()" class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-700">Try-On Records</h1>
            <button
                @click="openCreateModal()"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Create New
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Shop</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Lens</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Customer</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Try-On Time</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($tryOns as $tryon)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3">{{ $tryon->shop->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $tryon->lens->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $tryon->customer->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $tryon->tryon_time }}</td>
                            <td class="px-6 py-3 text-center space-x-2">
                                <button @click="openViewModal({{ $tryon->id }})" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">View</button>
                                <button @click="openEditModal({{ $tryon->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>
                                <button @click="confirmDelete({{ $tryon->id }})" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create/Edit Modal -->
        <div x-show="showFormModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
            <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4" x-text="isEditing ? 'Edit Try-On' : 'Create Try-On'"></h2>

                <form @submit.prevent="saveTryOn">
                    <div class="grid gap-4">
                        <div>
                            <label class="block text-sm text-gray-700">Shop ID</label>
                            <input type="text" x-model="form.shop_id" class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700">Lens ID</label>
                            <input type="text" x-model="form.lens_id" class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700">Customer ID</label>
                            <input type="text" x-model="form.customer_id" class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700">Try-On Time</label>
                            <input type="datetime-local" x-model="form.tryon_time" class="w-full border rounded px-3 py-2">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-2">
                        <button type="button" @click="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" x-text="isEditing ? 'Update' : 'Save'"></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- View Modal -->
        <div x-show="showViewModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
            <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4">View Try-On Record</h2>
                <p><strong>Shop:</strong> <span x-text="selected.shop"></span></p>
                <p><strong>Lens:</strong> <span x-text="selected.lens"></span></p>
                <p><strong>Customer:</strong> <span x-text="selected.customer"></span></p>
                <p><strong>Time:</strong> <span x-text="selected.time"></span></p>

                <div class="flex justify-end mt-4">
                    <button @click="closeModal()" class="px-4 py-2 bg-blue-500 text-white rounded">Close</button>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation -->
        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-60">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center w-full max-w-sm">
                <h2 class="text-lg font-semibold mb-4">Are you sure you want to delete?</h2>
                <div class="flex justify-center space-x-3">
                    <button @click="closeModal()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">No</button>
                    <button @click="deleteTryOn()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tryOnApp() {
            return {
                showFormModal: false,
                showViewModal: false,
                showDeleteModal: false,
                isEditing: false,
                form: { id: '', shop_id: '', lens_id: '', customer_id: '', tryon_time: '' },
                selected: { shop: '', lens: '', customer: '', time: '' },

                openCreateModal() {
                    this.isEditing = false;
                    this.form = { shop_id: '', lens_id: '', customer_id: '', tryon_time: '' };
                    this.showFormModal = true;
                },
                openEditModal(id) {
                    this.isEditing = true;
                    // Fetch record via AJAX (replace with your endpoint)
                    // Example: axios.get(`/tryons/${id}`).then(res => this.form = res.data);
                    this.form = { id, shop_id: '1', lens_id: '2', customer_id: '3', tryon_time: '2025-11-02T15:00' };
                    this.showFormModal = true;
                },
                openViewModal(id) {
                    // Fetch record via AJAX (replace with your endpoint)
                    this.selected = { shop: 'VisionTech', lens: 'Soft Lens', customer: 'Ali Khan', time: '2025-11-02 15:00' };
                    this.showViewModal = true;
                },
                confirmDelete(id) {
                    this.form.id = id;
                    this.showDeleteModal = true;
                },
                saveTryOn() {
                    // Use axios.post or put for backend integration
                    this.showFormModal = false;
                    alert(this.isEditing ? 'Updated successfully!' : 'Created successfully!');
                },
                deleteTryOn() {
                    // axios.delete(`/tryons/${this.form.id}`)
                    this.showDeleteModal = false;
                    alert('Record deleted!');
                },
                closeModal() {
                    this.showFormModal = false;
                    this.showViewModal = false;
                    this.showDeleteModal = false;
                }
            }
        }
    </script>

</body>
</html>
