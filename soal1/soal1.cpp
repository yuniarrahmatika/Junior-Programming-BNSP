#include <iostream>
#include <fstream>

using namespace std;

int temp,banyak,jumlah;
char angka[100];
ofstream file;

//menginputkan angka
void inputangka(){
	cout << "angka yang diinputkan : ";
	file << "angka yang diinputkan : ";
	for(int i=0;i<banyak;i++){
		cin >> angka[i];
		file << angka[i] << ' ';
	}
	file << endl;
	cout << endl;
}

//sorting
void ascending(){
	for(int i=0;i<banyak-1;i++){
		for(int j=0;j<banyak-i-1;j++){
			if(angka[j]>angka[j+1]){
				temp=angka[j];
				angka[j]=angka[j+1];
				angka[j+1]=temp;
			}
		}
	}
}

//menghitung jumlah angka yang diinputkan
void jumlahangka(){
	cout << "Hasil :\n";
	file << "\nHasil :\n";
	for (int i=0; i<banyak; i++){
		jumlah = 0;
		for(int j=0; j<banyak; j++){
			jumlah += angka[i]==angka[j];
		}
		//agar tidak menampilkan angka yang sudah ditampilkan sebelumnya
		if(angka[i] != angka[i-1]){
			cout << angka[i] << " : " << jumlah << endl;
			file << angka[i] << " : " << jumlah << endl;
		}
	}
	cout<<endl;
	cout<<"\ndata sudah di simpan di file angka.txt"<<endl;
	cout<<endl;
}

int main(){
	char yesno;
	file.open("angka.txt");
	do{	
		cout << "masukkan banyak data : ";
		cin >> banyak;
		cout << endl;
		file << "masukkan banyak data : " << banyak << endl;
		inputangka();
		ascending();
		jumlahangka();
		cout << "kembali ke menu?(y/n) : ";
		cin >> yesno;
		system("cls");
	}while(yesno=='y' || yesno=='Y');
	file.close();
	return jumlah;
}
