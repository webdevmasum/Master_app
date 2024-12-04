<div>
    <!-- Page Heading -->
    <h1 class="mb-4 text-2xl font-semibold">Categories</h1>

    <!-- Create Category Button -->
    <div class="mb-4">
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Create New Category
        </a>
    </div>

    <!-- Categories Table -->
    <table id="categories-table" class="table-auto w-full text-left">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- DataTable content will be dynamically loaded here -->
        </tbody>
    </table>
</div>

@push('styles')
    <!-- DataTables Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        document.addEventListener('livewire:load', function () {
            // Initialize DataTable on page load or Livewire render
            const table = $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('categories.index') }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                // Additional DataTable settings
                pageLength: 10,
                lengthMenu: [10, 25, 50, 75, 100],
                responsive: true,
                autoWidth: false
            });

            // Listen for Livewire updates and refresh DataTable
            Livewire.on('refreshCategoriesTable', () => {
                table.ajax.reload();
            });
        });
    </script>
@endpush
