#include<stdio.h>
#include<iostream>
#include<map>

using namespace std;

int main () {

    int n;
    string line, alpha;

    cin >> n;
    getline(cin, line);
    for (int x = 0; x < n; x ++) {
        getline(cin, line);
        getline(cin, alpha);
        map<char, char> mapa;
        mapa[' '] = ' ';
        for (int i = 0; i < 26; i ++) {
            mapa[ char( (int)('A'+i) ) ] = alpha[i];
        }
        printf("%d ", x+1);
        for (int i = 0; i < line.length(); i ++) {
            printf("%c", mapa[ line[i] ]);
        }
        printf("\n");
    }

    return 0;

}
