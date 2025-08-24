# Master Data Reference Implementation

## Overview
Implementation of master data functionality for "Pengirim Barang" (Shipper) and "Penjual Barang" (Seller) with reference data selection capability in the entitas tab.

## Features Implemented

### 1. Master Data Models
- **PengirimBarang Model**: Handles shipper master data
- **PenjualBarang Model**: Handles seller master data
- Both models include: `nama`, `alamat`, `negara`, `is_active` fields
- Active scope for filtering active records

### 2. Database Structure
- `pengirim_barangs` table with migration
- `penjual_barangs` table with migration  
- Sample data seeders with Japanese and Singapore companies

### 3. API Endpoints
- `GET /api/pengirim-barang` - Retrieve shipper data
- `GET /api/penjual-barang` - Retrieve seller data
- Support for search and country filtering
- JSON response format

### 4. Reference Data Modal
- Interactive modal component (`reference-data-modal.blade.php`)
- Search functionality by name/address
- Filter by country (Japan/Singapore)
- Responsive design with loading states
- Auto-fill form fields when item is selected

### 5. Form Integration
- "Data Referensi" buttons in entitas tab
- Click to open reference data modal
- Auto-populate form fields with selected data
- Seamless user experience without manual typing

### 6. Admin Panel
- Full CRUD operations for both master data types
- Admin controllers: `PengirimBarangController`, `PenjualBarangController`
- Admin views with listing, create, edit functionality
- Pagination and status management
- Access via "Admin Panel" link in main header

## File Structure

### Models
- `app/Models/PengirimBarang.php`
- `app/Models/PenjualBarang.php`

### Controllers
- `app/Http/Controllers/Api/ReferenceDataController.php`
- `app/Http/Controllers/Admin/PengirimBarangController.php`
- `app/Http/Controllers/Admin/PenjualBarangController.php`

### Views
- `resources/views/components/reference-data-modal.blade.php`
- `resources/views/admin/layout.blade.php`
- `resources/views/admin/pengirim-barang/index.blade.php`
- `resources/views/admin/pengirim-barang/create.blade.php`
- `resources/views/admin/pengirim-barang/edit.blade.php`
- `resources/views/admin/penjual-barang/index.blade.php`
- `resources/views/admin/penjual-barang/create.blade.php`
- `resources/views/admin/penjual-barang/edit.blade.php`

### Database
- `database/migrations/2025_08_24_114628_create_pengirim_barangs_table.php`
- `database/migrations/2025_08_24_114633_create_penjual_barangs_table.php`
- `database/seeders/PengirimBarangSeeder.php`
- `database/seeders/PenjualBarangSeeder.php`

### Routes
- API routes for reference data retrieval
- Admin routes for CRUD operations

## Usage Instructions

### For Users
1. Navigate to document edit page
2. Go to "Entitas" tab
3. Click "Data Referensi" button for Pengirim or Penjual Barang
4. Search or filter data in the modal
5. Select desired company
6. Form fields are automatically populated

### For Administrators
1. Click "Admin Panel" link in main header
2. Manage Pengirim Barang or Penjual Barang data
3. Add, edit, or delete master data entries
4. Set active/inactive status for entries

## Sample Data Included
- 10 Pengirim Barang entries (5 Japan, 5 Singapore companies)
- 10 Penjual Barang entries (6 Japan, 4 Singapore companies)
- Realistic company names and addresses

## Technology Stack
- Laravel 11
- Tailwind CSS
- JavaScript (ES6)
- SQLite Database
- Blade Templates

## Benefits
- Eliminates manual data entry errors
- Consistent data format
- Improved user experience
- Centralized master data management
- Easy maintenance through admin panel
- Search and filter capabilities
- Responsive design for all devices
