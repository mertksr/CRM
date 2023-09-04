$(document).ready(function () {
  /*


    /* Custom filtering function which will search data in column four between two values */
  $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    var min = parseInt($("#min").val(), 10);
    var max = parseInt($("#max").val(), 10);
    var age = parseFloat(data[3]) || 0; // use data for the age column

    if (
      (isNaN(min) && isNaN(max)) ||
      (isNaN(min) && age <= max) ||
      (min <= age && isNaN(max)) ||
      (min <= age && age <= max)
    ) {
      return true;
    }
    return false;
  });

  /*
        HTML5 Export
    */
  var savedState = JSON.parse(localStorage.getItem("myDataTableState"));

  // DataTable
  // var table = $('#musteriler').DataTable({
  //     "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
  //     "<'table-responsive'tr>" +
  //     "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
  //     "oLanguage": {
  //         "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
  //         "sInfo": "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
  //         "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
  //         "sSearchPlaceholder": "Search...",
  //        "sLengthMenu": "Results :  _MENU_",
  //     },

  //     "stripeClasses": [],
  //     "pageLength": 10 ,
  //     "columnDefs": [
  //         { orderable: false, targets: '_all',

  //      }
  //         ],
  //         stateSave: true,
  // stateSaveCallback: function(settings, data) {
  //     // Sütunlardaki özel arama değerlerini kaydedin
  //     data.searchCols = [];
  //     $('#specialsearch').each(function() {
  //         data.searchCols.push({
  //             search: this.value
  //         });
  //     });

  //     localStorage.setItem('myDataTableState', JSON.stringify(data));
  // },
  // stateLoadCallback: function(settings) {
  //     // Kaydedilmiş durumu yüklerken sütunlardaki özel arama değerlerini geri yükleyin
  //     if (savedState && savedState.searchCols) {
  //         $('#specialsearch').each(function(index) {
  //             if (savedState.searchCols[index]) {
  //                 this.value = savedState.searchCols[index].search;
  //             }
  //         });
  //     }

  //     return savedState;
  // }
  // });

  $('input[id="specialsearch"]').on("keyup", function () {
    // table.columns().search( '' ); // Reset all column searches
    table.column($(this).parent().index()).search(this.value).draw(); // Apply the search on the corresponding column
  }); //     $('#musteriler thead tr').clone(true).appendTo( '#musteriler thead' );
  //     $('#musteriler thead tr:eq(1) th').each( function (i) {
  //         if(i!= 6 && i!= 7){
  //         var title = $(this).text();
  //         $(this).html( '<input type="text"  class="form-control" placeholder="Ara '+title+'" />' );
  //         $( 'input', this ).on( 'keyup change', function () {
  //             if ( table.column(i).search() !== this.value ) {
  //                 table
  //                     .column(i)
  //                     .search( this.value )
  //                     .draw();
  //             }
  //         } );
  //  } } );
  // Apply the search

  $("#html5-extensionaaa").DataTable({
    dom:
      "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
      buttons: [
        { extend: "excel", className: "btn btn-sm" },
        { extend: "print", className: "btn btn-sm" },
      ],
    },
    responsive: true,
    oLanguage: {
      oPaginate: {
        sPrevious:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        sNext:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
      },
      sInfo: "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
      sSearch:
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      sSearchPlaceholder: "Ara...",
      sLengthMenu: "Results :  _MENU_",
    },
    language: {
      emptyTable: "Tabloda herhangi bir veri mevcut değil",
      info: "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
      infoEmpty: "Kayıt yok",
      infoFiltered: "(_MAX_ kayıt içerisinden bulunan)",
      infoThousands: ".",
      lengthMenu: "Sayfada _MENU_ kayıt göster",
      loadingRecords: "Yükleniyor...",
      processing: "İşleniyor...",
      search: "Ara:",
      zeroRecords: "Eşleşen kayıt bulunamadı",
      paginate: {
        first: "İlk",
        last: "Son",
        next: "Sonraki",
        previous: "Önceki",
      },
      aria: {
        sortAscending: ": artan sütun sıralamasını aktifleştir",
        sortDescending: ": azalan sütun sıralamasını aktifleştir",
      },
      select: {
        rows: {
          _: "%d kayıt seçildi",
          1: "1 kayıt seçildi",
        },
        cells: {
          1: "1 hücre seçildi",
          _: "%d hücre seçildi",
        },
        columns: {
          1: "1 sütun seçildi",
          _: "%d sütun seçildi",
        },
      },
      autoFill: {
        cancel: "İptal",
        fillHorizontal: "Hücreleri yatay olarak doldur",
        fillVertical: "Hücreleri dikey olarak doldur",
        fill: "Bütün hücreleri <i>%d</i> ile doldur",
      },
      buttons: {
        collection:
          'Koleksiyon <span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span>',
        colvis: "Sütun görünürlüğü",
        colvisRestore: "Görünürlüğü eski haline getir",
        copySuccess: {
          1: "1 satır panoya kopyalandı",
          _: "%ds satır panoya kopyalandı",
        },
        copyTitle: "Panoya kopyala",
        csv: "CSV",
        excel: "Excel",
        pageLength: {
          "-1": "Bütün satırları göster",
          _: "%d satır göster",
        },
        pdf: "PDF",
        print: "Yazdır",
        copy: "Kopyala",
        copyKeys:
          "Tablodaki veriyi kopyalamak için CTRL veya u2318 + C tuşlarına basınız. İptal etmek için bu mesaja tıklayın veya escape tuşuna basın.",
        createState: "Şuanki Görünümü Kaydet",
        removeAllStates: "Tüm Görünümleri Sil",
        removeState: "Aktif Görünümü Sil",
        renameState: "Aktif Görünümün Adını Değiştir",
        savedStates: "Kaydedilmiş Görünümler",
        stateRestore: "Görünüm -&gt; %d",
        updateState: "Aktif Görünümün Güncelle",
      },
      searchBuilder: {
        add: "Koşul Ekle",
        button: {
          0: "Arama Oluşturucu",
          _: "Arama Oluşturucu (%d)",
        },
        condition: "Koşul",
        conditions: {
          date: {
            after: "Sonra",
            before: "Önce",
            between: "Arasında",
            empty: "Boş",
            equals: "Eşittir",
            not: "Değildir",
            notBetween: "Dışında",
            notEmpty: "Dolu",
          },
          number: {
            between: "Arasında",
            empty: "Boş",
            equals: "Eşittir",
            gt: "Büyüktür",
            gte: "Büyük eşittir",
            lt: "Küçüktür",
            lte: "Küçük eşittir",
            not: "Değildir",
            notBetween: "Dışında",
            notEmpty: "Dolu",
          },
          string: {
            contains: "İçerir",
            empty: "Boş",
            endsWith: "İle biter",
            equals: "Eşittir",
            not: "Değildir",
            notEmpty: "Dolu",
            startsWith: "İle başlar",
            notContains: "İçermeyen",
            notStartsWith: "Başlamayan",
            notEndsWith: "Bitmeyen",
          },
          array: {
            contains: "İçerir",
            empty: "Boş",
            equals: "Eşittir",
            not: "Değildir",
            notEmpty: "Dolu",
            without: "Hariç",
          },
        },
        data: "Veri",
        deleteTitle: "Filtreleme kuralını silin",
        leftTitle: "Kriteri dışarı çıkart",
        logicAnd: "ve",
        logicOr: "veya",
        rightTitle: "Kriteri içeri al",
        title: {
          0: "Arama Oluşturucu",
          _: "Arama Oluşturucu (%d)",
        },
        value: "Değer",
        clearAll: "Filtreleri Temizle",
      },
      searchPanes: {
        clearMessage: "Hepsini Temizle",
        collapse: {
          0: "Arama Bölmesi",
          _: "Arama Bölmesi (%d)",
        },
        count: "{total}",
        countFiltered: "{shown}/{total}",
        emptyPanes: "Arama Bölmesi yok",
        loadMessage: "Arama Bölmeleri yükleniyor ...",
        title: "Etkin filtreler - %d",
        showMessage: "Tümünü Göster",
        collapseMessage: "Tümünü Gizle",
      },
      thousands: ".",
      datetime: {
        amPm: ["öö", "ös"],
        hours: "Saat",
        minutes: "Dakika",
        next: "Sonraki",
        previous: "Önceki",
        seconds: "Saniye",
        unknown: "Bilinmeyen",
        weekdays: {
          6: "Paz",
          5: "Cmt",
          4: "Cum",
          3: "Per",
          2: "Çar",
          1: "Sal",
          0: "Pzt",
        },
        months: {
          9: "Ekim",
          8: "Eylül",
          7: "Ağustos",
          6: "Temmuz",
          5: "Haziran",
          4: "Mayıs",
          3: "Nisan",
          2: "Mart",
          11: "Aralık",
          10: "Kasım",
          1: "Şubat",
          0: "Ocak",
        },
      },
      decimal: ",",
      editor: {
        close: "Kapat",
        create: {
          button: "Yeni",
          submit: "Kaydet",
          title: "Yeni kayıt oluştur",
        },
        edit: {
          button: "Düzenle",
          submit: "Güncelle",
          title: "Kaydı düzenle",
        },
        error: {
          system: "Bir sistem hatası oluştu (Ayrıntılı bilgi)",
        },
        multi: {
          info: "Seçili kayıtlar bu alanda farklı değerler içeriyor. Seçili kayıtların hepsinde bu alana aynı değeri atamak için buraya tıklayın; aksi halde her kayıt bu alanda kendi değerini koruyacak.",
          noMulti:
            "Bu alan bir grup olarak değil ancak tekil olarak düzenlenebilir.",
          restore: "Değişiklikleri geri al",
          title: "Çoklu değer",
        },
        remove: {
          button: "Sil",
          confirm: {
            _: "%d adet kaydı silmek istediğinize emin misiniz?",
            1: "Bu kaydı silmek istediğinizden emin misiniz?",
          },
          submit: "Sil",
          title: "Kayıtları sil",
        },
      },
      stateRestore: {
        creationModal: {
          button: "Kaydet",
          columns: {
            search: "Kolon Araması",
            visible: "Kolon Görünümü",
          },
          name: "Görünüm İsmi",
          order: "Sıralama",
          paging: "Sayfalama",
          scroller: "Kaydırma (Scrool)",
          search: "Arama",
          searchBuilder: "Arama Oluşturucu",
          select: "Seçimler",
          title: "Yeni Görünüm Oluştur",
          toggleLabel: "Kaydedilecek Olanlar",
        },
        duplicateError: "Bu Görünüm Daha Önce Tanımlanmış",
        emptyError: "Görünüm Boş Olamaz",
        emptyStates: "Herhangi Bir Görünüm Yok",
        removeJoiner: "ve",
        removeSubmit: "Sil",
        removeTitle: "Görünüm Sil",
        renameButton: "Değiştir",
        renameLabel: "Görünüme Yeni İsim Ver -&gt; %s:",
        renameTitle: "Görünüm İsmini Değiştir",
        removeConfirm: "Görünümü silmek istediğinize emin misiniz?",
        removeError: "Görünüm silinemedi",
      },
    },
    stripeClasses: [],
    lengthMenu: [7, 10, 20, 50],
    pageLength: 10,
  });
  $("#urunler").DataTable({
    dom:
      "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
      buttons: [
        { extend: "excel", className: "btn btn-sm" },
        { extend: "print", className: "btn btn-sm" },
      ],
    },
    responsive: true,
    oLanguage: {
      oPaginate: {
        sPrevious:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        sNext:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
      },
      sInfo: "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
      sSearch:
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      sSearchPlaceholder: "Ara...",
      sLengthMenu: "Results :  _MENU_",
    },
    language: {
      emptyTable: "Tabloda herhangi bir veri mevcut değil",
      info: "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
      infoEmpty: "Kayıt yok",
      infoFiltered: "(_MAX_ kayıt içerisinden bulunan)",
      infoThousands: ".",
      lengthMenu: "Sayfada _MENU_ kayıt göster",
      loadingRecords: "Yükleniyor...",
      processing: "İşleniyor...",
      search: "Ara:",
      zeroRecords: "Eşleşen kayıt bulunamadı",
      paginate: {
        first: "İlk",
        last: "Son",
        next: "Sonraki",
        previous: "Önceki",
      },
      aria: {
        sortAscending: ": artan sütun sıralamasını aktifleştir",
        sortDescending: ": azalan sütun sıralamasını aktifleştir",
      },
      select: {
        rows: {
          _: "%d kayıt seçildi",
          1: "1 kayıt seçildi",
        },
        cells: {
          1: "1 hücre seçildi",
          _: "%d hücre seçildi",
        },
        columns: {
          1: "1 sütun seçildi",
          _: "%d sütun seçildi",
        },
      },
      autoFill: {
        cancel: "İptal",
        fillHorizontal: "Hücreleri yatay olarak doldur",
        fillVertical: "Hücreleri dikey olarak doldur",
        fill: "Bütün hücreleri <i>%d</i> ile doldur",
      },
      buttons: {
        collection:
          'Koleksiyon <span class="ui-button-icon-primary ui-icon ui-icon-triangle-1-s"></span>',
        colvis: "Sütun görünürlüğü",
        colvisRestore: "Görünürlüğü eski haline getir",
        copySuccess: {
          1: "1 satır panoya kopyalandı",
          _: "%ds satır panoya kopyalandı",
        },
        copyTitle: "Panoya kopyala",
        csv: "CSV",
        excel: "Excel",
        pageLength: {
          "-1": "Bütün satırları göster",
          _: "%d satır göster",
        },
        pdf: "PDF",
        print: "Yazdır",
        copy: "Kopyala",
        copyKeys:
          "Tablodaki veriyi kopyalamak için CTRL veya u2318 + C tuşlarına basınız. İptal etmek için bu mesaja tıklayın veya escape tuşuna basın.",
        createState: "Şuanki Görünümü Kaydet",
        removeAllStates: "Tüm Görünümleri Sil",
        removeState: "Aktif Görünümü Sil",
        renameState: "Aktif Görünümün Adını Değiştir",
        savedStates: "Kaydedilmiş Görünümler",
        stateRestore: "Görünüm -&gt; %d",
        updateState: "Aktif Görünümün Güncelle",
      },
      searchBuilder: {
        add: "Koşul Ekle",
        button: {
          0: "Arama Oluşturucu",
          _: "Arama Oluşturucu (%d)",
        },
        condition: "Koşul",
        conditions: {
          date: {
            after: "Sonra",
            before: "Önce",
            between: "Arasında",
            empty: "Boş",
            equals: "Eşittir",
            not: "Değildir",
            notBetween: "Dışında",
            notEmpty: "Dolu",
          },
          number: {
            between: "Arasında",
            empty: "Boş",
            equals: "Eşittir",
            gt: "Büyüktür",
            gte: "Büyük eşittir",
            lt: "Küçüktür",
            lte: "Küçük eşittir",
            not: "Değildir",
            notBetween: "Dışında",
            notEmpty: "Dolu",
          },
          string: {
            contains: "İçerir",
            empty: "Boş",
            endsWith: "İle biter",
            equals: "Eşittir",
            not: "Değildir",
            notEmpty: "Dolu",
            startsWith: "İle başlar",
            notContains: "İçermeyen",
            notStartsWith: "Başlamayan",
            notEndsWith: "Bitmeyen",
          },
          array: {
            contains: "İçerir",
            empty: "Boş",
            equals: "Eşittir",
            not: "Değildir",
            notEmpty: "Dolu",
            without: "Hariç",
          },
        },
        data: "Veri",
        deleteTitle: "Filtreleme kuralını silin",
        leftTitle: "Kriteri dışarı çıkart",
        logicAnd: "ve",
        logicOr: "veya",
        rightTitle: "Kriteri içeri al",
        title: {
          0: "Arama Oluşturucu",
          _: "Arama Oluşturucu (%d)",
        },
        value: "Değer",
        clearAll: "Filtreleri Temizle",
      },
      searchPanes: {
        clearMessage: "Hepsini Temizle",
        collapse: {
          0: "Arama Bölmesi",
          _: "Arama Bölmesi (%d)",
        },
        count: "{total}",
        countFiltered: "{shown}/{total}",
        emptyPanes: "Arama Bölmesi yok",
        loadMessage: "Arama Bölmeleri yükleniyor ...",
        title: "Etkin filtreler - %d",
        showMessage: "Tümünü Göster",
        collapseMessage: "Tümünü Gizle",
      },
      thousands: ".",
      datetime: {
        amPm: ["öö", "ös"],
        hours: "Saat",
        minutes: "Dakika",
        next: "Sonraki",
        previous: "Önceki",
        seconds: "Saniye",
        unknown: "Bilinmeyen",
        weekdays: {
          6: "Paz",
          5: "Cmt",
          4: "Cum",
          3: "Per",
          2: "Çar",
          1: "Sal",
          0: "Pzt",
        },
        months: {
          9: "Ekim",
          8: "Eylül",
          7: "Ağustos",
          6: "Temmuz",
          5: "Haziran",
          4: "Mayıs",
          3: "Nisan",
          2: "Mart",
          11: "Aralık",
          10: "Kasım",
          1: "Şubat",
          0: "Ocak",
        },
      },
      decimal: ",",
      editor: {
        close: "Kapat",
        create: {
          button: "Yeni",
          submit: "Kaydet",
          title: "Yeni kayıt oluştur",
        },
        edit: {
          button: "Düzenle",
          submit: "Güncelle",
          title: "Kaydı düzenle",
        },
        error: {
          system: "Bir sistem hatası oluştu (Ayrıntılı bilgi)",
        },
        multi: {
          info: "Seçili kayıtlar bu alanda farklı değerler içeriyor. Seçili kayıtların hepsinde bu alana aynı değeri atamak için buraya tıklayın; aksi halde her kayıt bu alanda kendi değerini koruyacak.",
          noMulti:
            "Bu alan bir grup olarak değil ancak tekil olarak düzenlenebilir.",
          restore: "Değişiklikleri geri al",
          title: "Çoklu değer",
        },
        remove: {
          button: "Sil",
          confirm: {
            _: "%d adet kaydı silmek istediğinize emin misiniz?",
            1: "Bu kaydı silmek istediğinizden emin misiniz?",
          },
          submit: "Sil",
          title: "Kayıtları sil",
        },
      },
      stateRestore: {
        creationModal: {
          button: "Kaydet",
          columns: {
            search: "Kolon Araması",
            visible: "Kolon Görünümü",
          },
          name: "Görünüm İsmi",
          order: "Sıralama",
          paging: "Sayfalama",
          scroller: "Kaydırma (Scrool)",
          search: "Arama",
          searchBuilder: "Arama Oluşturucu",
          select: "Seçimler",
          title: "Yeni Görünüm Oluştur",
          toggleLabel: "Kaydedilecek Olanlar",
        },
        duplicateError: "Bu Görünüm Daha Önce Tanımlanmış",
        emptyError: "Görünüm Boş Olamaz",
        emptyStates: "Herhangi Bir Görünüm Yok",
        removeJoiner: "ve",
        removeSubmit: "Sil",
        removeTitle: "Görünüm Sil",
        renameButton: "Değiştir",
        renameLabel: "Görünüme Yeni İsim Ver -&gt; %s:",
        renameTitle: "Görünüm İsmini Değiştir",
        removeConfirm: "Görünümü silmek istediğinize emin misiniz?",
        removeError: "Görünüm silinemedi",
      },
    },
    stripeClasses: [],
    lengthMenu: [7, 10, 20, 50],
    pageLength: 10,
  });
  $("#islemler").DataTable({
    dom:
      "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    buttons: {
      buttons: [
        { extend: "excel", className: "btn btn-sm" },
        { extend: "print", className: "btn btn-sm" },
      ],
    },
    responsive: true,
    oLanguage: {
      oPaginate: {
        sPrevious:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        sNext:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
      },
      sInfo: "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
      sSearch:
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      sSearchPlaceholder: "Ara...",
      sLengthMenu: "Results :  _MENU_",
    },
    stripeClasses: [],
    lengthMenu: [7, 10, 20, 50],
    pageLength: 10,
    stripeClasses: [],
    pageLength: 10,
    columnDefs: [{ orderable: false, targets: "_all" }],
    stateSave: true,
    stateSaveCallback: function (settings, data) {
      // Sütunlardaki özel arama değerlerini kaydedin
      data.searchCols = [];
      $("#specialsearch").each(function () {
        data.searchCols.push({
          search: this.value,
        });
      });

      localStorage.setItem("myDataTableState", JSON.stringify(data));
    },
    stateLoadCallback: function (settings) {
      // Kaydedilmiş durumu yüklerken sütunlardaki özel arama değerlerini geri yükleyin
      if (savedState && savedState.searchCols) {
        $("#specialsearch").each(function (index) {
          if (savedState.searchCols[index]) {
            this.value = savedState.searchCols[index].search;
          }
        });
      }

      return savedState;
    },
  });

  var table = $("#randevular").DataTable({
    dom:
      "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    oLanguage: {
      oPaginate: {
        sPrevious:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        sNext:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
      },
      sInfo: "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
      sSearch:
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      sSearchPlaceholder: "Search...",
      sLengthMenu: "Results :  _MENU_",
    },
    responsive: true,
    stripeClasses: [],
    pageLength: 10,
    columnDefs: [{ orderable: false, targets: "_all" }],
    stateSave: true,
    stateSaveCallback: function (settings, data) {
      // Sütunlardaki özel arama değerlerini kaydedin
      data.searchCols = [];
      $("#specialsearch").each(function () {
        data.searchCols.push({
          search: this.value,
        });
      });

      localStorage.setItem("myDataTableState", JSON.stringify(data));
    },
    stateLoadCallback: function (settings) {
      // Kaydedilmiş durumu yüklerken sütunlardaki özel arama değerlerini geri yükleyin
      if (savedState && savedState.searchCols) {
        $("#specialsearch").each(function (index) {
          if (savedState.searchCols[index]) {
            this.value = savedState.searchCols[index].search;
          }
        });
      }

      return savedState;
    },
  });

  var table = $("#musteriler").DataTable({
    dom:
      "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    oLanguage: {
      oPaginate: {
        sPrevious:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        sNext:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
      },
      sInfo: "_TOTAL_ kayıttan _END_ tanesi gösteriliyor",
      sSearch:
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      sSearchPlaceholder: "Search...",
      sLengthMenu: "Results :  _MENU_",
    },
    responsive: true,
    stripeClasses: [],
    pageLength: 10,
    columnDefs: [{ orderable: false, targets: "_all" }],
    stateSave: true,
    stateSaveCallback: function (settings, data) {
      // Sütunlardaki özel arama değerlerini kaydedin
      data.searchCols = [];
      $("#specialsearch").each(function () {
        data.searchCols.push({
          search: this.value,
        });
      });

      localStorage.setItem("myDataTableState", JSON.stringify(data));
    },
    stateLoadCallback: function (settings) {
      // Kaydedilmiş durumu yüklerken sütunlardaki özel arama değerlerini geri yükleyin
      if (savedState && savedState.searchCols) {
        $("#specialsearch").each(function (index) {
          if (savedState.searchCols[index]) {
            this.value = savedState.searchCols[index].search;
          }
        });
      }

      return savedState;
    },
  });

  /*
        Live Dom Ordering
    */

  /* Create an array with the values of all the input boxes in a column */
  $.fn.dataTable.ext.order["dom-text"] = function (settings, col) {
    return this.api()
      .column(col, { order: "index" })
      .nodes()
      .map(function (td, i) {
        return $("input", td).val();
      });
  };
  /* Create an array with the values of all the input boxes in a column, parsed as numbers */
  $.fn.dataTable.ext.order["dom-text-numeric"] = function (settings, col) {
    return this.api()
      .column(col, { order: "index" })
      .nodes()
      .map(function (td, i) {
        return $("input", td).val() * 1;
      });
  };
  /* Create an array with the values of all the select options in a column */
  $.fn.dataTable.ext.order["dom-select"] = function (settings, col) {
    return this.api()
      .column(col, { order: "index" })
      .nodes()
      .map(function (td, i) {
        return $("select", td).val();
      });
  };
  /* Create an array with the values of all the checkboxes in a column */
  $.fn.dataTable.ext.order["dom-checkbox"] = function (settings, col) {
    return this.api()
      .column(col, { order: "index" })
      .nodes()
      .map(function (td, i) {
        return $("input", td).prop("checked") ? "1" : "0";
      });
  };

  $("#example").DataTable({
    columns: [
      null,
      { orderDataType: "dom-text-numeric" },
      { orderDataType: "dom-text", type: "string" },
      { orderDataType: "dom-select" },
    ],
    dom:
      "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    oLanguage: {
      oPaginate: {
        sPrevious:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        sNext:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
      },
      sInfo: "Showing page _PAGE_ of _PAGES_",
      sSearch:
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      sSearchPlaceholder: "Search...",
      sLengthMenu: "Results :  _MENU_",
    },
    stripeClasses: [],
    lengthMenu: [7, 10, 20, 50],
    pageLength: 10,
  });
});
