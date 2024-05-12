use pcap;

fn main() {
    let device = pcap::Device::lookup()
        .expect("lookup failed")
        .expect("no device connected");
    println!("using interface : {}", device.name);

    let mut capture = pcap::Capture::from_device(device)
        .unwrap()
        .immediate_mode(true)
        .open()
        .expect("msg");

    capture.filter("arp", true).unwrap();
    
    for _i in 0..=5{
            println!("ARP packet : {:?}", capture.next_packet());
    }
}