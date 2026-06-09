<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketPurchaseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_submit_registration_form_and_it_creates_order()
    {
        $response = $this->post(route('ticket.store'), [
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'phone' => '08987654321',
            'quantity' => 2,
        ]);

        $order = Order::first();

        $this->assertNotNull($order);
        $this->assertEquals('Jane Doe', $order->name);
        $this->assertEquals('jane.doe@example.com', $order->email);
        $this->assertEquals(2, $order->quantity);
        $this->assertEquals(70000, $order->total_amount);
        $this->assertEquals('pending', $order->payment_status);

        $response->assertRedirect(route('ticket.success', $order->order_code));
    }

    /** @test */
    public function admin_can_manually_update_payment_status_to_paid_which_creates_ticket_code()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@iwf.com',
            'password' => bcrypt('adminiwf2026'),
        ]);

        $order = Order::create([
            'order_code' => 'IWF-20260608-ABCDEF',
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '081234567890',
            'quantity' => 1,
            'ticket_price' => 35000,
            'total_amount' => 35000,
            'payment_status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->post(route('admin.orders.updateStatus', $order->id), [
            'payment_status' => 'paid',
        ]);

        $order->refresh();

        $this->assertEquals('paid', $order->payment_status);
        $this->assertNotNull($order->ticket_code);
        $this->assertStringStartsWith('TICKET-IWF-', $order->ticket_code);

        $response->assertRedirect(route('admin.orders.index'));
    }

    /** @test */
    public function a_user_can_check_order_status_via_ajax_endpoint()
    {
        $order = Order::create([
            'order_code' => 'IWF-20260609-XYZ123',
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '081222333444',
            'quantity' => 3,
            'ticket_price' => 35000,
            'total_amount' => 105000,
            'payment_status' => 'paid',
            'ticket_code' => 'TICKET-IWF-XYZ123',
        ]);

        $response = $this->get(route('ticket.checkStatus', $order->order_code));

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'payment_status' => 'paid',
            'ticket_code' => 'TICKET-IWF-XYZ123',
            'name' => 'Jane Smith',
            'phone' => '081222333444',
            'email' => 'jane.smith@example.com',
            'quantity' => 3,
            'total_amount_formatted' => 'Rp105.000',
        ]);
    }

    /** @test */
    public function admin_can_export_orders_list_to_excel()
    {
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@iwf.com',
            'password' => bcrypt('adminiwf2026'),
        ]);

        Order::create([
            'order_code' => 'IWF-20260609-EXPORT',
            'name' => 'Export Tester',
            'email' => 'tester@example.com',
            'phone' => '08111222333',
            'quantity' => 1,
            'ticket_price' => 35000,
            'total_amount' => 35000,
            'payment_status' => 'paid',
            'ticket_code' => 'TICKET-IWF-EXPORT',
        ]);

        $response = $this->actingAs($admin)->get(route('admin.orders.export'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Disposition', 'attachment; filename=daftar-pendaftar-iwf-2026.xlsx');
        
        $content = $response->streamedContent();
        $this->assertStringStartsWith("PK\x03\x04", $content);
    }
}


